@if ($currentStep != 1)
    <div style="display: none" class=" setup-content" id="step-1">
@endif

<div class="col-xs-12 ">
    <div class="col-md-12">
        <br>


        <div class="form-row">


            <div class="container pay-ways-box active-form p-5 w-100"
                style="background:white;padding: 40px; border-radius: 40px;margin-bottom: 40px;">
                <!-- Start of the title -->
                <h4 class="fs-4 fw-bold mb-3 text-center">إيداع</h4>
                <!-- End of the title -->


                <div class="deposit-steps d-flex flex-wrap px-2 overflow-hidden">
                    <!-- Start of the first step -->
                    <div id="firstStep" class="step first-step w-100 position-relative">
                        <div class="row m-0">
                            <!-- Pay ways title -->
                            <h5 class="col-lg-2 p-0 mb-3 fs-5 fw-bold">طريقة الدفع</h5>
                            <!-- Pay ways container -->
                            <div class="col-lg-10 pay-ways p-0 d-flex align-items-center flex-wrap mb-3 ">
                                <?php
                                $payment_methods = \App\Models\paymentMethod::orderBy('id', 'DESC')->get();
                                
                                ?>

                                @forelse ($payment_methods as $payment_method)
                                    <div class="pay-way">
                                        {{-- <input type="hidden" wire:key="payment_method" value="{{$payment_method->id}}" /> --}}
                                        <input type="radio" name="payment_method_id" value={{ $payment_method->id }}
                                            wire:model="payment_method_id" data-percent="20" data-fixed="0"
                                            data-min_deposit="5" data-max_deposit="4006"
                                            id="payment_type_1_{{ $payment_method->id }}" class="payment_method d-none">
                                        <label for="payment_type_1_{{ $payment_method->id }}"
                                            class="d-flex align-items-center p-2 ms-3 mb-3 border border-2 ">
                                            <!-- Pay way img -->
                                            <img
                                                src="{{ asset('assets/uploads') . '/' . $payment_method->photo }}"class="d-block ms-3">
                                            <!-- Pay way details -->
                                            <div class="pay-way-details">
                                                <h6 class="fs-6 fw-bold text-capitalize mb-2">
                                                    {{ $payment_method->name }}
                                                </h6>
                                                <span class="fs-6 text-muted">1.00 $ =&gt;
                                                    0.8 $</span>
                                            </div>
                                        </label>
                                    </div>


                                @empty
                                    <tr class="text-center">
                                        <td colspan="10">لا توجد باقة مضافة أو مفعلة بعد</td>
                                    </tr>
                                @endforelse

                                @error('payment_method_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Start of the amount box -->
                            <div class="amount row p-0 mx-0 align-items-center mb-4">
                                <!-- Amount title -->
                                <h5 class="col-xl-2 col-12 fs-5 fw-bold mb-3 mb-xl-0 px-0">
                                    المبلغ
                                </h5>
                                <div class="col row no-gutters">
                                    <div class="col-xl-5 cols-12 mb-3 pe-0 mb-xl-0">
                                        <!-- Amount input -->
                                        <input type="number" min="1" name="total_deposited_amount"
                                            wire:model="total_deposited_amount" id="amountInput"
                                            class="form-control fs-5" step="any" placeholder="أدخل المبلغ">
                                    </div>
                                    @error('total_deposited_amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- End of the cion select -->
                            </div>
                            <!-- End of the amount box -->



                            <div class="d-flex align-items-center justify-content-end">
                                <!-- Second step btn -->
                                <button id="secondStepBtn" type="button"
                                    class="btn btn-primary fs-5 lh-lg fw-bold p-1 px-5" wire:click="firstStepSubmit">
                                    التالي »
                                </button>
                                <!-- End of the second step btn -->
                            </div>

                            <!-- End of the epay container -->
                        </div>
                    </div>
                    <!-- End of the first step -->

      

                </div>
                <!-- End of the deposit steps -->
            </div>




        </div>
    </div>

</div>


</div>
