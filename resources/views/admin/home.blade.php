@extends('shared.dashboard.main')

@section('title', 'Admin')

@section('content')
    <div class="dashboard">
        <div class="row">
            <div class="col l6 m6 s12">
                <div class="card green white-text valign-wrapper hoverable">
                    <div class="card-icon green darken-2 valign-wrapper">
                        <i class="material-icons medium valign">check_circle</i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-stats-number">{{count(\App\Proofs::where('user_id', auth()->user()->id)->where('status', 'accepted')->get())}}</h3>
                        <p>Approved Proofs</p>
                    </div>
                </div>
            </div>

            <div class="col l6 m6 s12">
                <div class="card blue darken-1 white-text valign-wrapper hoverable">
                    <div class="card-icon blue darken-3 valign-wrapper">
                        <i class="material-icons medium valign">description</i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-stats-number">{{count(\App\Proofs::where('user_id', auth()->user()->id)->get())}}</h3>
                        <p>Total generated proofs</p>
                    </div>
                </div>
            </div>

            <div class="col l12 m6 s12">
                <div class="card black-text valign hoverable">
                    <a href="javascript:" class="btn-floating btn-large halfway-fab waves-effect waves-light red" id="modal-btn"><i class="material-icons">add</i></a>
                    <div class="card-title blue darken-3" style="color: white; padding: 10px; text-align: left !important;">
                        Generated Proofs
                    </div>
                    <div class="card-content">
                        <?php
                        $proofs = \App\Proofs::where('user_id', auth()->user()->id)->get();
                        if (count($proofs) < 1){
                            echo "<h3 style='text-align: center'>You haven't generated any proofs yet</h3>" ;
                        }
                         else{
                            ?>
                            <table class="highlight table-responsive">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Client's Email</th>
                                    <th>Approval Status</th>
                                    <th>Download Proof</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $number = 1;
                                foreach ($proofs as $proof){
                                ?>
                                <tr>
                                    <td>{{$number}}</td>
                                    <td>{{$proof->email}}</td>
                                    <td>{{$proof->status}}</td>
                                    <td><a href="{{url($proof->proof_path)}}" target="_blank">Download</a> </td>
                                </tr>
                                <?php
                                        $number++;
                                }
                                ?>
                                </tbody>
                            </table>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div id="modal1" class="modal">
        <form action="{{url('/home/proof')}}" id="proof-form" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="modal-content">
            <h4>Generate Proof</h4>
                <div class="row one">
                    <div class="input-field col l6 m6 s12">
                        <input name="proof_name" id="proof_name" type="text" class="validate">
                        <label for="proof_name">Proof Name</label>
                        <p style="color: red;" id="name"></p>
                    </div>

                    <div class="file-field input-field col l6 m6 s12">
                        <div class="btn">
                            <span>Upload</span>
                            <input type="file" name="images[]" id="file" multiple>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files" readonly>
                        </div>
                        <p style="color: red" id="photo"></p>
                    </div>

                </div>
                <div class="row two">
                    <div class="input-field col l4 m4 s10">
                        <select name="paper_size">
                            <option value="" disabled selected>Choose your Paper Size</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                            <option value="A4">A4</option>
                            <option value="A5">A5</option>
                        </select>
                        <label>Paper Size</label>
                    </div>
                    <div class="input-field col l4 m4 s10">
                        <select name="orientation">
                            <option value="" disabled selected>Choose your Orientation</option>
                            <option value="landscape">Landscape</option>
                            <option value="portrait">Portrait</option>
                        </select>
                        <label>Orientation</label>
                    </div>
                    <div class="input-field col l4 m4 s10">
                        <input placeholder="Placeholder" id="margin_size" type="number" class="validate" value="1" name="margin_size">
                        <label for="first_name">Margin Size</label>
                    </div>
                </div>
        </div>
        <div class="modal-footer" style="margin-bottom: 10px">
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">close</a>
            <button class=" waves-effect waves-green btn" value="Generate" id="submit">Generate</button>
        </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
       $(document).ready(function () {
           @if(count($errors))
                       @foreach($errors->all() as $error)
                           Materialize.toast('{{ $error }}', 4000, 'rounded error');
                       @endforeach
           @endif
           @if($message = Session::get('error'))
                Materialize.toast('{{ $message }}', 4000, 'rounded error');
           @endif
            @if($message = Session::get('success'))
                Materialize.toast('{{ $message }}', 4000, 'rounded success');
           @endif
$('.modal').modal();
           $('select').material_select();
           $('#modal-btn').click(function () {
               $('#modal1').modal().modal('open');
           });
           $('#submit').click(function (e) {
                   if ($('#proof_name').val() === "" || $('#file').val() === ""){
                       if ($('#proof_name').val() === ""){
                           $('#name').text('please enter proof name');
                       }
                       if ($('#file').val() === ""){
                           $('#photo').text('please select at least one image');
                       }
                       e.preventDefault();
                   }
                   else {
                       $('#proof-form').submit();
                   }
           });
       })
    </script>
@endsection