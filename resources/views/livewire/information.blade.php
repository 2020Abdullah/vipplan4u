@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="form-row">
            <div class="col"
                style="background:white;padding: 40px; border-radius: 40px;margin-bottom: 40px;">
                <h5>the information</h5>
                <span>lalalala lorem oooooooooooooooooooooooooo<br>oooooooooooooooooooooooooooooooooooooooo</span>
                <div>
                    <h5>the account</h5>

                    {{-- @if($payment_method->id) --}}

                    {{$number_account}}
                    {{-- @endif --}}
                    {{-- @if($payment_method=="checked")
                    <span>06060</span>
                    @elseif($payment_method=="44")
                      <span>4444</span>
                      @else
                        <span>tytyty</span>
                        @endif --}}
                </div>
                <div>
                    <h5>the total</h5>
                    <span>{{$total_deposited_amount}}</span>
                </div>
            </div>

        </div>


        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
            {{ trans('Parent_trans.Back') }}
        </button>
        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">
            {{ trans('Parent_trans.Back') }}
        </button>

    </div>
</div>
</div>
