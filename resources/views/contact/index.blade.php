@extends('layout.main')

    @section('title', 'Contact')

    @section('isi')
            <x-card>
                <div class="row py-5">
                <div class="col-md-6">
                    <x-card>
                       <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                       </div>
                       <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="email">
                       </div>
                        <div class="form-group">
                        <textarea class="form-control" name="pesan" placeholder="Massege"></textarea>
                       </div>
                       <button type="button" class="btn btn-success w-100"><i class="fa fa-sign-alt"></i>Kirim</button>
                    </x-card>

                </div>
                <div class="col-md-6">
                  <div class="row pb-5">
                  <div class="mapouter">
                      <div class="gmap_canvas">
                          <iframe width="100%" height="440" id="gmap_canvas" src="https://maps.google.com/maps?q=Av.+Lúcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                          
                      </div>
                  </div>
                </div>
                </div>
            </div>
               </x-card>
    @endsection