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
    protected function teamInvoiceCreated(array $payload)
    {
        // TBC
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

                $team->forceFill([
                    'credit' => 10
                ]);

                break;

            case "consent-30":

                $team->forceFill([
                    'credit' => 30
                ]);

                break;

            case "consent-60":

                $team->forceFill([
                    'credit' => 60
                ]);

                break;

        }

        return new Response('Webhook Handled', 200);
    }

}