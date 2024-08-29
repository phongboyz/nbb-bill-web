<div>
    <div class="row">
        <div class="col-md-6 order-md-2">
            <img src="{{asset('login/images/logoprint.jpg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="mb-4">
                        <h1 style="font-family: 'Phetsarath OT';"> <strong>ລະບົບແບບພິມ ເອກະສານ ທນບ</strong></h1>
                        <p class="mb-4" style="font-size: 20px;font-family: 'Phetsarath OT';">ລະບົບແບບພິມ ເອກະສານ ທນບ</p>
                    </div>
                    <div class="form-group first">
                        <label for="username">
                            <h5 class="phetsarath-font">ອີເມວ</h5>
                        </label>
                        <input type="email" class="form-control phetsarath-font @error('username') is-invalid @enderror" id="username"
                            wire:model="username" wire:keydown.enter="login">
                        @error('username') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group last mb-4">
                        <label for="password">
                            <h5 class="phetsarath-font">ລະຫັດຜ່ານ</h5>
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" wire:model="password" wire:keydown.enter="login">
                        @error('password') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <buttom type="submit" class="btn text-white btn-block btn-primary"
                        wire:click="login"> <h5 class="phetsarath-font p-2">ເຂົ້າລະບົບ</h5></buttom>
                </div>
            </div>
        </div>
    </div>

    

</div>

@push('scripts')
<script>

    window.addEventListener('show-reset', event => {
        $('#modal-reset').modal('show');
    })

</script>
@endpush