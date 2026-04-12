@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Company / Personal Details
    </div>

    <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="company_name">Company / Personal Name</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $setting->company_name) }}">
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="company_email">Email</label>
                <input class="form-control {{ $errors->has('company_email') ? 'is-invalid' : '' }}" type="email" name="company_email" id="company_email" value="{{ old('company_email', $setting->company_email) }}">
                @if($errors->has('company_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_email') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="company_phone">Phone</label>
                <input class="form-control {{ $errors->has('company_phone') ? 'is-invalid' : '' }}" type="text" name="company_phone" id="company_phone" value="{{ old('company_phone', $setting->company_phone) }}">
                @if($errors->has('company_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_phone') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="company_address_line1">Address Line 1</label>
                <input class="form-control {{ $errors->has('company_address_line1') ? 'is-invalid' : '' }}" type="text" name="company_address_line1" id="company_address_line1" value="{{ old('company_address_line1', $setting->company_address_line1) }}">
                @if($errors->has('company_address_line1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_address_line1') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="company_address_line2">Address Line 2 (City, Zip, etc.)</label>
                <input class="form-control {{ $errors->has('company_address_line2') ? 'is-invalid' : '' }}" type="text" name="company_address_line2" id="company_address_line2" value="{{ old('company_address_line2', $setting->company_address_line2) }}">
                @if($errors->has('company_address_line2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_address_line2') }}
                    </div>
                @endif
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
