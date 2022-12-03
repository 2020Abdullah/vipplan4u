@if ($currentStep == 2)
    <div class="account_info">
        <div class="row">
            <div class="col-md-12">
                <h5 class="mb-3">تعليمات الدفع</h5>
                <div class="account_number mb-4">
                    <p class="lead">يرجي إرسال المبلغ المطلوب علي هذا الحساب ثم الضغط علي التالي</p>
                    <h4>الحساب</h4>
                    {{$number_account}}
                </div>
                <div class="account_total mb-4">
                    <h5>المبلغ المطلوب</h5>
                    <span>{{$total_deposited_amount}}</span>
                </div>
            </div>
            <div class="col-md-12">
                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                    رجوع
                </button>
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">
                    التالي »
                </button>
            </div>
        </div>
    </div>
@endif


