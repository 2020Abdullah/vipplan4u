@if ($currentStep != 3)
    <div style="display: none" class=" setup-content" id="step-1">
@endif

@if ($currentStep == 3)
    <div class="col-xs-12 ">
        <div class="col-md-12">
            <br>


            <div class="form-row">
                <div class="col">
                    @if ($photo)
                        <img src="{{ $photo }}" width="200px" />
                    @endif
                    <label for="title">إثبات التحويل</label>
                    <input type="file" name="photo" id="photo" wire:change="$emit('fileChoose')"
                        class="form-control">
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="mt-3">
                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(2)">
                    رجوع
                </button>

                <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right" wire:click="save" type="button">تأكيد
                </button>
            </div>

        </div>
    </div>
@endif


@section('scripts')
    <script>
        window.livewire.on('fileChoose', () => {
            let inputField = document.getElementById('photo');
            let file = inputField.files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('fileUploaded', reader.result)
            }
            reader.readAsDataURL(file);

        })
    </script>
@endsection
