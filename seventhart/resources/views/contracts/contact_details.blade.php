@extends('layouts.app')

@section('title', '7th Art')

@section('content')

@if (Session::has('mssg'))
    <div class="alert alert-success">        
            <span>{{ Session::get('mssg') }}</span>        
    </div>
@endif

<div class="contact-details"> 
    <h2 align="center">Setup new contract - contact details</h2><br><br>
    <form name="contact_info" id="contact_info" action="/contracts/contactInfo" method="POST">
        @csrf

        <ul>
            <li>
                <label for="lname">Licensee's Name:</label>
                <input type="text" id="lname" name="lname">
            </li>
            <li>
                <label for="laddr">Licensee's Address:</label>
                <textarea id="laddr" name="laddr"></textarea>
            </li>
            <li>
                <label for="ldelAddr">Delivery Address: (if different from Licensee address)</label>
                <textarea id="ldelAddr" name="ldelAddr"></textarea>
            </li>
            <li>
                <label for="lcontName">Licensee's Contact Name:</label>
                <input type="text" id="lcontName" name="lcontName">
            </li>
            <li>
                <label for="lcontEmail">Licensee's Contact Email:</label>
                <input type="email" id="lcontEmail" name="lcontEmail">
            </li>
            <li>
                <label for="lcontPhone">Licensee's Contact Tel no(s):</label>
                <input type="text" id="lcontPhone" name="lcontPhone">
            </li>
            <li>
                <label for="mcontName">Marketing Contact Name:</label>
                <input type="text" id="mcontName" name="mcontName">
            </li>
            <li>
                <label for="mContEmail">Marketing Contact Email:</label>
                <input type="email" id="mContEmail" name="mContEmail"><br>
                <span style="color: red; font-weight: bold;">This email address will receive access to all marketing 
                    materials including DCP trailer and handouts.</span>
            </li>
            <li>
                <label for="digCap">Digital Poster Capability?:</label>
                <input type="checkbox" id="digCap" name="digCap">
            </li>
            <li>
                <label for="cInvEmail">Contact Email for invoicing:</label>
                <input type="email" id="cInvEmail" name="cInvEmail">
            </li>
            <li>
                <label for="ticketPrice">Ticket Prices:</label>
                <input type="text" id="ticketPrice" name="ticketPrice">
            </li>
            <li>
                <label for="vatReg">VAT Registered?:</label>
                <input type="checkbox" id="vatReg" name="vatReg">
            </li>
            <li>
                <label for="vatNo">VAT No:</label>
                <input type="text" id="vatNo" name="vatNo">
            </li>


        </ul>


    </form>
</div>
@endsection