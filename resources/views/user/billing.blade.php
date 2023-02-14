@extends('layouts.app')

@section('content')
<!-- Portfolio list -->
<section class="container pt-5">
<div class="row">
<!-- Sidebar (User info + Account menu) -->
@include('user.nav')
<!-- Account security -->
<div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 mt-n3 mt-md-0">
<div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
    <h1 class="h2 pt-xl-1 pb-3">Mes factures</h1>
    <!-- Billing portal button -->
    <div class="text-center mx-auto mb-3">
        <h5>Votre facture sera prochainement disponible</h5>
    </div>
    
</div>
<!-- Show invoices -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                <td>{{ $invoice->total() }}</td>
                                <td>{{ $invoice->status }}</td>
                                <td>
                                    <a href="{{ $invoice->hosted_invoice_url }}" class="btn btn-secondary btn-sm">Voir</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@include('template.rrweb')
@endsection