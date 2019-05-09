<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Invoice</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #fff;
            background-image: none;
            font-size: 12px;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
        address{
            margin-top:15px;
        }
        h2 {
            font-size:28px;
            color:#cccccc;
        }
        .container {
            padding-top:15px;
        }
        .invoice-head td {
            padding: 0 8px;
        }
        .invoice-body{
            background-color:transparent;
        }
        .logo {
            padding-bottom: 10px;
        }
        .table th {
            vertical-align: bottom;
            font-weight: bold;
            padding: 8px;
            line-height: 20px;
            text-align: left;
        }
        .table td {
            padding: 8px;
            line-height: 20px;
            text-align: left;
            vertical-align: top;
            border-top: 1px solid #dddddd;
        }
        .well {
            margin-top: 15px;
        }
    </style>
</head>

<body>
        <div class="container">
            <table width="550" style="margin-left: auto; margin-right: auto">
                <tr valign="top">
                    <!-- Organization Name / Image -->
                    <td align="right" style="text-align: right" colspan="4">
                        <p>
                            <img src="images/logo-dark-sm.png" width="200"/>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td align="left">
                        <p>
                           <span style="font-size: 22px"><strong>TAX INVOICE</strong></span><br /><br />
                            {{ $owner->name  }}<br />
                            {{ $owner->email ?? null }}
                        </p>
                    <!-- Extra / VAT Information -->
                        @if (isset($vat))
                            <p>
                                {{ $vat }}
                            </p>
                        @endif

                    </td>
                    <td align="left">
                        &nbsp;
                    </td>
                    <!-- Organization Name / Date -->
                    <td>
                        <p>
                            <strong>Invoice Date:</strong><br />
                            {{ $invoice->date()->toFormattedDateString() }}
                        </p>
                        <!-- Invoice Info -->
                        <p>
                            {{--  <strong>Product:</strong> {{ $product }}<br>--}}
                            <strong>Invoice Number:</strong><br />
                            INV-{{ $id ?? $invoice->id }}<br>
                        </p>
                        <p>
                            <strong>ABN:</strong><br />
                            92 623 589 284
                        </p>
                    </td>
                    <td>
                        <p>
                            PRACWAY PTY LTD<br> t/as Consentic<br>
                            @if (isset($street))
                                {{ $street }}<br>
                            @endif
                            @if (isset($location))
                                {{ $location }}<br>
                            @endif
                            @if (isset($phone) && $phone !='')
                                <strong>T</strong> {{ $phone }}<br>
                            @endif
                            @if (isset($vendorVat))
                                {{ $vendorVat }}<br>
                            @endif
                            @if (isset($url))
                                <a href="{{ $url }}">{{ $url }}</a>
                            @endif
                        </p>
                    </td>

                </tr>

                <tr valign="top">
                    <td colspan="4">
                        <table width="100%" class="table" border="0">
                            <tr>
                                <th align="left">Description</th>
                                <th align="right">Date</th>
                                <th align="right">Amount</th>
                            </tr>

                            <!-- Existing Balance -->
                            <tr>
                                <td>Starting Balance</td>
                                <td>&nbsp;</td>
                                <td>{{ $invoice->startingBalance() }}</td>
                            </tr>

                            <!-- Display The Invoice Items -->
                            @foreach ($invoice->invoiceItems() as $item)
                                <tr>
                                    <td colspan="2">{{ $item->description }}</td>
                                    <td>{{ $item->total() }}</td>
                                </tr>
                            @endforeach

                        <!-- Display The Subscriptions -->
                            @foreach ($invoice->subscriptions() as $subscription)
                                <tr>
                                    <td>{{ print_r($subscription->asStripeInvoiceItem()) }}</td>
                                    <td>
                                        {{ $subscription->startDateAsCarbon()->formatLocalized('%B %e, %Y') }} -
                                        {{ $subscription->endDateAsCarbon()->formatLocalized('%B %e, %Y') }}
                                    </td>
                                    <td>{{ $subscription->total() }}</td>
                                </tr>
                            @endforeach

                        <!-- Display The Discount -->
                            @if ($invoice->hasDiscount())
                                <tr>
                                    @if ($invoice->discountIsPercentage())
                                        <td>{{ $invoice->coupon() }} ({{ $invoice->percentOff() }}% Off)</td>
                                    @else
                                        <td>{{ $invoice->coupon() }} ({{ $invoice->amountOff() }} Off)</td>
                                    @endif
                                    <td>-{{ $invoice->discount() }}</td>
                                </tr>
                            @endif

                        <!-- Display The Tax Amount -->
                            @if ($invoice->tax_percent)
                                <tr>
                                    <td>Tax ({{ $invoice->tax_percent }}%)</td>
                                    <td>&nbsp;</td>
                                    <td>{{ Laravel\Cashier\Cashier::formatAmount($invoice->tax) }}</td>
                                </tr>
                            @else   <!-- Display GST Manually for now -->
                            <tr>
                                <td>GST 10%</td>
                                <td>&nbsp;</td>
                                <td>{{ Laravel\Cashier\Cashier::formatAmount($invoice->total() - ($invoice->total() / 1.1)) }}</td>
                            </tr>

                            @endif

                        <!-- Display The Final Total -->
                            <tr style="border-top:2px solid #000;">
                                <td>&nbsp;</td>
                                <td style="text-align: right;"><strong>Total</strong></td>
                                <td><strong>{{ $invoice->total() }} inc GST</strong></td>
                            </tr>
                            <tr style="border-top:2px solid #000;">
                                <td>&nbsp;</td>
                                <td style="text-align: right; color: green;"><strong>Paid</strong></td>
                                <td style="color: green;"><strong>{{ $invoice->total() }} inc GST</strong></td>
                            </tr>
                            <tr style="border-top:2px solid #000;">
                                <td>&nbsp;</td>
                                <td style="text-align: right;"><strong>Total Due</strong></td>
                                <td><strong>{{ Laravel\Cashier\Cashier::formatAmount(0) }} inc GST</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
</body>
</html>
