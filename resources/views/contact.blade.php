
    <div class="enregistrement-contenu contact " id='contact'>
  
            <h2>{{ __('form-contact.form-titre') }}</h2>
        <div class="content">
            <div class="contactInfo m-d">
                <div class="contactInfoBx ">
                    <div class="box">
                        <div class="icon">
                            <i class='fa fa-map-marker' style="font-size: 1em; color:  #E74C3C ;"></i>
                        </div>
                        <div class="text">
                            <h3> {{ __('form-contact.form-info1.titre') }}</h3>
                            <p>4465 rue de bellechasse ,<br>Montreal ,Quebec,Canada<br>
                                h1t3r8</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"> <i class='fa fa-phone' style="font-size: 1em; color:  #E74C3C ;"></i>
                        </div>
                        <div class="text">
                            <h3> {{ __('form-contact.form-info2.titre') }}</h3>
                            <p>+1 438-874-0323</p>
                        </div>
                    </div>
                    <div class="box">   
                        <div class="icon"> <i class='fa fa-envelope'  style="font-size: 1em; color:  #E74C3C ;"></i></div>
                        <div class="text">
                            <h3> {{ __('form-contact.form-info3.titre') }}</h3>
                            <p>jeanreneyapo@yahoo.com</p>
                        </div>
                    </div>
                </div>


            </div>
            <div method='POST' class="formBx m-d">
                <div class="msg"></div>
                <form action="" class='contact-form'>
                    <h3>{{ __('form-contact.form-infoC') }}</h3>
                    <input type="text" name="" class='name' placeholder="{{ __('form-contact.placeholder.name') }}" required>
                    <input type="email" name="" class='email'  placeholder="{{ __('form-contact.placeholder.email') }}" required>
                    <textarea placeholder="{{ __('form-contact.placeholder.message') }}"class='message'  name="" id="" cols="30" rows="10" required></textarea>
                    <input type="submit" value="{{ __('form-contact.form-input') }}">
                </form>
                <div class="infoResult"></div>
            </div>
        </div>
</div>