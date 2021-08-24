@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.address.index.page-title') }}
@endsection

@section('content-wrapper')
<section class="profile">
    <div class="container">
        <h2>Account</h2>
        <div class="details">
            <div class="user">
                <!-- <img src="images/user-profile.png" alt="User Profile"> -->
                <span>{{ auth()->guard('customer')->user()->name }}</span>
            </div>
            <a href="{{ route('customer.profile.edit') }}" class="grey-border">Edit Profile <img src="{{ asset('/themes/velocity/assets/images/edit.svg') }}" alt="Edit"></a>
            <div class="clear"></div>
        </div>
    </div>
</section>
<section class="dashboard-tabs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 nopadding">
                        <div class="col-md-4 col-sm-12">
                             @include('shop::customers.account.partials.sidemenu')
                            <a href="{{ route('customer.session.destroy') }}" class="blue-btn deskOn">Logout</a>
                        </div>

                        <div class="col-md-8 col-sm-12">
                            <div class="address products-payment">
                                <div class="add-new">
                                    <p>
                                       <!--  <a href="#" class="add-address address_open" id="address_open">{{ __('shop::app.customer.account.address.index.title') }}</a> -->
                                    </p>
                                    @if (! $addresses->isEmpty())
                                        <span class="account-action">
                                        <a href="{{ route('customer.address.create') }}" class="add-address"><img src="{{ asset('/themes/velocity/assets/images/fusion-door-payment/add-new.png') }}" alt="">{{ __('shop::app.customer.account.address.index.add') }}</a>
                                    </span>
                                    @else
                                        <span></span>
                                    @endif
                                </div>


                                @foreach ($addresses as $address)

                                <div class="deliver-sect">
                                    <div class="radio2">
                                        <input id="radio-1" name="radio" type="radio">
                                        <label for="radio-1" class="radio-label">{{ auth()->guard('customer')->user()->name }}</label>
                                    </div>
                                    <div class="top-t">
                                        <p class="address2">{{ $address->address1 }} {{ $address->city }} ,{{ $address->state }}<br> {{ core()->country_name($address->country) }} {{ $address->postcode }} </p>
                                        <p class="mob-no">Mobile:  <strong>{{ $address->phone }}</strong></p>
                                    </div> 
                                    <div class="btn-right">
                                        <a href="{{ route('customer.address.edit', $address->id) }}"><button class="edit-btn" type="button">Edit</button></a>
                                        <a href="{{ route('address.delete', $address->id) }}"
                                           onclick="deleteAddress('{{ __('shop::app.customer.account.address.index.confirm-delete') }}')"><button class="remove-btn" type="button">Remove</button></a>
                                    </div>
                                </div>
                                @endforeach
                            

                            </div>
                            <a href="#" class="blue-btn mobOn">Logout</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    </section>

<!-- <div id="address" class="well address">
    <div class="popup_close fade_close" title="Close" aria-label="Close" id="closepopup1"><span aria-hidden="true" class="closePop">×</span></div>
    <div class="formbx frmp account-layout">
        
        <form id="customer-address-form" method="post" action="{{ route('customer.address.store') }}" @submit.prevent="onSubmit">
            <p>Add New Address</p>
            <div class="formbx">
                @csrf
                <div class="input-list">
                    <input type="text" name="company_name" placeholder="Company Name">
                </div>
                <div class="input-list">
                    <input type="text" placeholder="First Name" name="first_name" id="fName" required onkeypress="return onlyCharacters(event);" maxlength="80" >                    
                </div>
                <div class="input-list">
                    <input type="text" placeholder="Last Name" name="last_name" id="lName" required onkeypress="return onlyCharacters(event);" maxlength="80" >
                </div>

                <div class="input-list">
                    <input type="text" placeholder="Flat/House No/Building/Company/Apartment" name="address1[]" id="address1">
                </div>
                <div class="input-list lfthalf">
                    <select class="control" id="country" name="country">
                
                        @foreach (core()->countries() as $country)
                           
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div class="input-list rgthalf">
                    <select  id="state" name="state">

                    <option value="">{{ __('shop::app.customer.account.address.create.select-state') }}</option>
                    
                </select>
                </div>
                <div class="input-list">
                    <input type="text" placeholder="City" name="city" id="city" required onkeypress="return onlyCharacters(event);" maxlength="80" >
                </div>
               
                <div class="clear"></div>
                <div class="input-list">
                    <input type="text" placeholder="Pincode" name="postcode" id="postcode" required onkeypress="return onlyNumbersAndPlus(event);" maxlength="7" >
                </div>
                <div class="input-list">
                    <input type="text" placeholder="Phone" name="phone" id="phone" required onkeypress="return onlyNumbersAndPlus(event);" maxlength="10" >

                    
                </div>
            </div>
            <a href="#" class="cancel">Cancel</a>
            <button>Save</button>
        </form>
    </div>
</div> -->
@endsection

@push('scripts')
    <script>
        function deleteAddress(message) {
            if (!confirm(message))
                event.preventDefault();
        }
    </script>
@endpush
