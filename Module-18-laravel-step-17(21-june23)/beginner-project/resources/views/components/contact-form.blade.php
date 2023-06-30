<!-- Page content-->
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Get in touch</h1>
                <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">

                    <form id="contactForm">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..."/>
                            <label for="name">Full name</label>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" />
                            <label for="email">Email address</label>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890"/>
                            <label for="phone">Phone number</label>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const contactForm = document.getElementById('contactForm');
    contactForm.addEventListener('submit',async (event)=>{
        event.preventDefault();

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let msg = document.getElementById('message').value;

        if(name.length === 0){
            alert('Name Is Required');
        }else if(email.length === 0){
            alert('Email Is Required');
        }else if(phone.length === 0){
            alert('Phone Is Required');
        } else {
            let fromData = {
                fullName:name,
                email:email,
                phone:phone,
                message:msg,
            }

            let URL="/contactRequest";
            // Loder show content hide
            document.getElementById('loading-div').classList.remove('d-none')
            document.getElementById('content-div').classList.add('d-none')

            let result = await axios.post(URL, fromData);

            // Loder hide content show
            document.getElementById('loading-div').classList.add('d-none')
            document.getElementById('content-div').classList.remove('d-none')


            if(result.status === 200 && result.data ===1){
                alert('Your Request Data has been submitted successfuly.');
                contactForm.reset();
            }else {
                contactForm.alert('Something is wrong..');
            }

        }



    })



</script>