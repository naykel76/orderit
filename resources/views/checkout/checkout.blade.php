<div>
    <h1>{{ $title ?? 'Checkout' }}</h1>

    <div class="flex-col md-flex-row md-va-t gg">

        <livewire:cart/>

        <div class="bx nm md-w-24">

            <h1>Total ${{ session('cartTotal') }}</h1>

            <div class="frm-row">

                <label class="fw4">
                    <input name="agree" id="agree" type="checkbox" />&nbsp; I agree to the
                    <a href="/terms-of-use" target="_blank">Terms and Conditions</a>
                </label>

                <br>
                @error('agree')
                    <span class="txt-red" role="alert"> {{ $message }} </span>
                @enderror
            </div>

            <br>

            <a href="" class="btn warning fullwidth"><img src="/images/paypal-check-out.png" alt="PayPal" /></a>

            <p class="my-05 tac"><strong>- or -</strong></p>

            <a href="" class="btn fullwidth nm">Pay by EFT</a>

        </div>

    </div>

</div>
