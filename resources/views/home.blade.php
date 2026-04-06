@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-welcome">
                <h2>
                    <i class="fas fa-bolt" style="background: linear-gradient(135deg, #06d6a0, #118ab2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-right: 0.5rem;"></i>
                    Welcome back!
                </h2>
                <p>Your freelancer CRM workspace is ready. Navigate using the sidebar to manage clients, projects, transactions, and reports.</p>
                <div class="accent-bar"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection