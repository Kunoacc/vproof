@extends('shared.dashboard.main')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard">
        <div class="row">
            <div class="col l4 m6 s12">
                <div class="card green white-text valign-wrapper hoverable">
                    <div class="card-icon green darken-2 valign-wrapper">
                        <i class="material-icons medium valign">check_circle</i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-stats-number">250</h3>
                        <p>Lorem ipsum</p>
                    </div>
                </div>
            </div>
            <div class="col l4 m6 s12">
                <div class="card blue darken-1 white-text valign-wrapper hoverable">
                    <div class="card-icon blue darken-3 valign-wrapper">
                        <i class="material-icons medium valign">description</i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-stats-number">15</h3>
                        <p>Lorem ipsum</p>
                    </div>
                </div>
            </div>
            <div class="col l4 m6 s12">
                <div class="card yellow darken-3 white-text valign-wrapper hoverable">
                    <div class="card-icon yellow darken-4 valign-wrapper">
                        <i class="material-icons medium valign">build</i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-stats-number">15</h3>
                        <p>Lorem ipsum</p>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12 hide-on-large-only">
                <div class="card red white-text valign-wrapper hoverable">
                    <div class="card-icon red darken-2 valign-wrapper">
                        <i class="material-icons medium valign">error</i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-stats-number">50</h3>
                        <p>Lorem ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection