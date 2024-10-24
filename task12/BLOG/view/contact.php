<?php session_start(); ?>
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Me</h1>
                            <span class="subheading">Have questions? I have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                        <div class="my-5">
                            <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST" action="index.php?page=message">
                            <div class="form-floating">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..."  />
                                    <label for="name">Name</label>
                                <?php 
                                    if(isset($_SESSION['error']['name']))
                                    {
                                        echo $_SESSION['error']['name'];
                                    }
                                ?>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..."  />
                                    <label for="email">Email address</label>
                                    <?php 
                                    if(isset($_SESSION['error']['email']))
                                    {
                                        echo $_SESSION['error']['email'];
                                    }
                                ?>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Enter your phone number..." />
                                    <label for="phone">Phone Number</label>
                                    <?php 
                                    if(isset($_SESSION['error']['phone']))
                                    {
                                        echo $_SESSION['error']['phone'];
                                    }
                                ?>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem"></textarea>
                                    <label for="message">Message</label>
                                    <?php 
                                    if(isset($_SESSION['error']['message']))
                                    {
                                        echo $_SESSION['error']['message'];
                                    }
                                ?>
                                </div>
                                <br />
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the form-->
                                <!-- has successfully submitted-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                        To activate this form, sign up at
                                        <br />
                                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                <!-- Submit Button-->
                                <button type="submit" class="btn btn-primary" id="submitButton" >Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php unset($_SESSION['error']) ?>