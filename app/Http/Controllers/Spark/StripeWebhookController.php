<?php

namespace App\Http\Controllers\Spark;

use Illuminate\Http\Response;
use Laravel\Spark\Contracts\Repositories\LocalInvoiceRepository;
use Laravel\Spark\Http\Controllers\Settings\Billing\StripeWebhookController as SparkStripeWebhookController;
use Laravel\Spark\Spark;

class StripeWebhookController extends SparkStripeWebhookController
{

    /**
     * Handle invoice created from a Stripe subscription.
     *
     * @param  array  $payload
     * @return \Illuminate\Http\Response
     */
    protected function handleInvoiceCreated(array $payload)
    {

        $user = $this->getUserByStripeId(
            $payload['data']['object']['customer']
        );

        if (is_null($user)) {
            return $this->teamInvoiceCreated($payload);
        }

        // We are team billing

    }

    /**
     * Handle invoice created from a Stripe subscription.
     *
     * @param  array  $payload
     * @return \Illuminate\Http\Response
     */
    protected function teamInvoiceCreated(array $payload)
    {

        // TBC
        // Check for overusages, add to invoice

    }

    /**
     * Handle a successful invoice payment from a Stripe subscription.
     *
     * By default, this e-mails a copy of the invoice to the customer.
     *
     * @param  array  $payload
     * @return \Illuminate\Http\Response
     */
    protected function handleInvoicePaymentSucceeded(array $payload)
    {
        $user = $this->getUserByStripeId(
            $payload['data']['object']['customer']
        );

        if (is_null($user)) {
            return $this->teamInvoicePaymentSucceeded($payload);
        }

        $invoice = $user->findInvoice($payload['data']['object']['id']);

        app(LocalInvoiceRepository::class)->createForUser($user, $invoice);

        $this->sendInvoiceNotification(
            $user, $invoice
        );

        return new Response('Webhook Handled', 200);
    }

    /**
     * Handle a successful invoice payment from a Stripe subscription.
     *
     * @param  array  $payload
     * @return \Illuminate\Http\Response
     */
    protected function teamInvoicePaymentSucceeded(array $payload)
    {
        $team = Spark::team()->where(
            'stripe_id', $payload['data']['object']['customer']
        )->first();

        if (is_null($team)) {
            return;
        }

        $invoice = $team->findInvoice($payload['data']['object']['id']);

        app(LocalInvoiceRepository::class)->createForTeam($team, $invoice);

        $this->sendInvoiceNotification(
            $team, $invoice
        );

        \App\TeamBillingCycle::create([
            'team_id' => $team->id,
            'plan' => $team->subscription()->provider_plan ?? null,
            'credit' => $team->credit,
        ]);

        switch($team->current_billing_plan){

            case "consent-10":

                $team->credit = 10;
                $team->save();

                break;

            case "consent-30":

                $team->credit = 30;
                $team->save();

                break;

            case "consent-60":

                $team->credit = 60;
                $team->save();

                break;

        }

        return new Response('Webhook Handled', 200);
    }

}