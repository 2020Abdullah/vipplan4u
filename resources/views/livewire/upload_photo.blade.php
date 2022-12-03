@if ($currentStep != 3)
    <div style="display: none" class=" setup-content" id="step-1">
@endif

@if ($currentStep == 3)
<div class="col-xs-12 ">
    <div class="col-md-12">
        <br>


        <div class="form-row">
            <div class="col">
            @if($Proof_img)
            <img src="{{$Proof_img}}" width="200px"/>
            @endif
                <label for="title">إثبات التحويل</label>
                <input type="file" name="Proof_img" id="Proof_img" wire:change="$emit('fileChoose')"  class="form-control">
                @error('Proof_img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
           
        </div>
    <div class="mt-3">
        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(2)">
                    رجوع
        </button>

        <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right" wire:click="save"
            type="button">تأكيد
        </button>
    </div>

    </div>
</div>
@endif


@section('scripts')
<script>
window.livewire.on('fileChoose',()=>{
    let inputField = document.getElementById('Proof_img');
    let file = inputField.files[0];
    let reader = new FileReader();
    reader.onloadend = ()=>{
window.livewire.emit('fileUploaded',reader.result)    }
    reader.readAsDataURL(file);
    
})
</script>

@endsection