<div class="container"style="background:#fff6f6ad;">
<div class="row pay-ways-box active-form p-5 w-100 " style="background:#fff6f6ad;">
    <h4 class="fs-4 fw-bold mb-3 text-center">إيداع</h4>

    <div class=" steps w-100 d-flex align-items-center justify-content-center mb-5 ">
        <!-- First step -->
        <div class=" step-icon first-step-icon d-flex align-items-center justify-content-center ms-2 ">

            <a href="#step-1" type="button"
                class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>


            <i class="mdi mdi-angle-left fs-3 text-white next">1</i>
            <i class="mdi mdi-check fs-3 text-white correct"></i>
        </div>
        <!-- End of the first step -->

        <!-- Line to the second step -->
        <h1 class="line second-step-line mb-0 position-relative">
            <span class="position-absolute h-100 w-0"></span>
        </h1>

        <!-- Second step -->
        <div class=" step-icon second-step-icon d-flex align-items-center justify-content-center mx-2 "> <a
                href="#step-2" type="button"
                class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
            <i class="mdi mdi-angle-left fs-3 text-white next">2</i>
            <i class="mdi mdi-check fs-3 text-white correct"></i>
        </div>
        <!-- End of the second step -->

        <!-- Line to the last step -->
        <h1 class="line last-step-line mb-0 position-relative">
            <span class="position-absolute h-100 w-0"></span>
        </h1>

        <!-- Last step -->
        <div class=" step-icon last-step-icon d-flex align-items-center justify-content-center me-2 "> <a href="#step-3"
                type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                disabled="disabled">3</a>
            <i class="mdi mdi-angle-left fs-3 text-white next">3</i>
            <i class="mdi mdi-check fs-3 text-white correct"></i>
        </div>
        <!-- End of the lst step -->
    </div>
    {{-- <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>الخطوة 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>الخطوة 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                    disabled="disabled">3</a>
                <p>الخطوة 3</p>
                <p></p>
            </div>
        </div>
    </div> --}}

    @include('livewire.pocket.payment_methode')
    @include('livewire.pocket.information')
    @include('livewire.pocket.upload_photo')

    @livewireScripts
</div>
</div>