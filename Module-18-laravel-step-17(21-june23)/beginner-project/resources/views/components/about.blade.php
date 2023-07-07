<!-- About Section-->
<section class="bg-light py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-xxl-8">
                <div class="text-center my-5">
                    <h class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h>
                    <p id="about-title" class="lead fw-light mb-4">My name is Start Bootstrap and I help brands grow.</p>
                    <p id="about-desc"  class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid cumque officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
                    <div class="d-flex justify-content-center fs-2 gap-4">
                        <a target="_blank" id="twitter" class="text-gradient" href=""><i class="bi bi-twitter"></i></a>
                        <a target="_blank" id="linkedin" class="text-gradient" href=""><i class="bi bi-linkedin"></i></a>
                        <a target="_blank" id="github" class="text-gradient" href=""><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    GetAboutDetails()
    async function GetAboutDetails() {

        try {
            let URL = "/aboutData";
            let response = await axios.get(URL);

            // Loding div hide show
            document.getElementById('loading-div').classList.add('d-none');
            document.getElementById('content-div').classList.remove('d-none');

            document.getElementById('about-title').innerHTML = response.data[0]['title']
            document.getElementById('about-desc').innerHTML = response.data[0]['details']

        } catch(error) {
            alert(error);
        }
    }
        
    GetSocialLink()
    async function GetSocialLink() {

        try {
            let URL = "/socialData";
            let response = await axios.get(URL);

            document.getElementById('twitter').href = response.data[0]['twitter']
            document.getElementById('linkedin').href = response.data[0]['githubLink']
            document.getElementById('github').href = response.data[0]['linkedinLink']

        } catch(error) {
            alert(error);
        }
    }

</script>
