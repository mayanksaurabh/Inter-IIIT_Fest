
<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/css?family=Pacifico|Josefin+Sans|Raleway:200,400" rel="stylesheet">
        <link rel="stylesheet" href="/fonts/font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel="shortcut icon" href="/img/IIITDMJ%20LOGO.png">
        <link rel="stylesheet" href="/css/mario.css"/>
        <link rel="stylesheet" href="/css/materialize.min.css">
        <link rel="stylesheet" href="/css/animate.css">
        <link rel="stylesheet" href="/css/style.css">

        <title>Inter IIIT Cultural &amp; Technical Fest</title>
    </head>

    <body> <!-- oncontextmenu="return false;"> -->

        <div class="main-container row">
            <div class="main-nav col s12 m8 offset-m2 wow fadeIn" data-wow-duration="0.75s" data-wow-delay="4s">
                <a class="col s12 m2" id="home">Home</a>
                <a class="col s12 m2" id="about">About</a>
                <a class="col s12 m2" id="events">Events</a>
                <a class="col s12 m2" id="mega_events">Mega Events</a>
                <a class="col s12 m2" id="team">Team</a>
                <a class="col s12 m2" id="contact">Contact</a>
            </div>
                <div class="login-btn col 12 m2">
            @if(Auth::check())
                    <a class="btn-flat btn col 12 dropdown-button" href="#" data-activities="user_dropdown">{{ Auth::user()->fest_id }}</a>
                </div>
            @else
                    <a class="btn-flat col 12 modal-trigger" href="#login">Login / Register</a>
                </div>
            @endif
            @if(Auth::check() && Auth::user()->city != null)
                <div id="user-modal modal" id="user">
                    <div class="modal-content">
                            
                    </div>
                </div>
            @elseif( !Auth::check() || (Auth::check() && Auth::user()->city == null))
                <div id="login" class="login-modal modal col s12 m6 offset-m3">
                    <div class="modal-content row">
                        <h4 class="col s12">Register / Login</h4>
                        <div class="col s6 register-btn-container">
                            <div class="col s10 offset-s1">
                                <a href="/auth/google" class="google col s12 btn-flat"><i class="fa fa-google"></i> Signup with Google</a>
                                <a href="/auth/facebook" class="fb col s12 btn-flat"><i class="fa fa-facebook"></i> Signup with Facebook</a>
                                <a href="#" class="custom col s12 btn-flat"><i class="fa fa-user"></i>Register Now</a>
                            </div>
                        </div>
                        <div class="col s6 login-form">
                            <form class="login_form">
                                <h6 class="col s12 red-text"></h6>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-field col s12">
                                    <input placeholder="Email" name="email" type="email" class="validate" required>
                                </div>
                                <div class="input-field col s12">
                                    <input placeholder="Password" name="password" type="password" class="validate" required>
                                </div>
                                <div class="input-field col s12">
                                    <button class="btn-flat col s8 offset-s2">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="col s12 register-form">
                            <form class="register_form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-field col s12">
                                    <input placeholder="Email" name="email" type="email" class="validate" required>
                                </div>
                                <div class="input-field col s12">
                                    <input placeholder="Name" name="name" type="text" class="validate" required>
                                </div>
                                <div class="input-field col s12">
                                    <input placeholder="Password" id="password" name="password" type="password" class="validate" required>
                                </div>
                                <div class="input-field col s12">
                                    <input placeholder="Confirm Password" id="cnfPassword" name="cnfPassword" type="password" class="validate" required>
                                </div>
                                <div class="input-field col s12">
                                    <button class="btn-flat col s8 offset-s2">Register</button>
                                </div>
                            </form>
                        </div>
                        <div class="col s12 details-form">
                            <h6 class="col s12">Kindly fill this form to continue...</h6>
                            <form class="details_form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-field col s12 m6">
                                    <input type="text" class="validate" name="festid" id="festid" readonly="true">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input type="text" class="validate" name="name" id="name" required>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select name="gender">
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <label>Gender</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input placeholder="Date of Birth" type="date" class="datepicker" name="date_of_birth" required>
                                </div>
                                <div class="input-field col s12 m6">
                                    <p>
                                        <input type="checkbox" id="iiitswitch" />
                                        <label for="iiitswitch">Are you from an IIIT ?</label>
                                        <input type="hidden" id="iiitflag" name="iiitflag" />
                                    </p>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input placeholder="Contact No." type="tel" class="validate" name="contact_other">
                                </div>
                                <div class="input-field col s12" id="college_iiit" style="display: none;">
                                    <select name="college_iiit">
                                        <option value="default" disabled selected>Select your Institute</option>
                                        <option value = "IIIT, Allahabad">Indian Institute of Information Technology, Allahabad</option>
                                        <option value = "IIIT, Chittor">Indian Institute of Information Technology, Chittoor, Sri City</option>
                                        <option value = "IIIT, Dharwad">Indian Institute of Information Technology, Dharwad</option>
                                        <option value = "IIIT, Guwahati">Indian Institute of Information Technology, Guwahati</option>
                                        <option value = "IIITM, Gwalior">Indian Institute of Information Technology and Management, Gwalior</option>
                                        <option value = "IIITDM, Jabalpur">Indian Institute of Information Technology, Design and Manufacturing, Jabalpur</option>
                                        <option value = "IIIT, Kalyani">Indian Institute of Information Technology, Kalyani</option>
                                        <option value = "IIITDM, Kancheepuram">Indian Institute of Information Technology, Design and Manufacturing, Kancheepuram</option>
                                        <option value = "IIIT, Kota">Indian Institute of Information Technology, Kota</option>
                                        <option value = "IIIT, Kottayam">Indian Institute of Information Technology, Kottayam</option>
                                        <option value = "IIIT, Kurnool">Indian Institute of Information Technology, Kurnool</option>
                                        <option value = "IIIT, Lucknow">Indian Institute of Information Technology, Lucknow</option>
                                        <option value = "IIIT, Manipur">Indian Institute of Information Technology, Manipur</option>
                                        <option value = "IIIT, Nagpur">Indian Institute of Information Technology, Nagpur</option>
                                        <option value = "IIIT, Pune">Indian Institute of Information Technology, Pune</option>
                                        <option value = "IIIT, Ranchi">Indian Institute of Information Technology, Ranchi</option>
                                        <option value = "IIIT, Sonepat">Indian Institute of Information Technology, Sonepat</option>
                                        <option value = "IIIT, Srirangam">Indian Institute of Information Technology, Srirangam</option>
                                        <option value = "IIIT, Una">Indian Institute of Information Technology, Una</option>
                                        <option value = "IIIT, Vadodara">Indian Institute of Information Technology, Vadodara</option>
                                    </select>
                                </div>
                                <div class="input-field col s12" id="college_other">
                                    <input placeholder="College Name" type="text" class="validate" name="college_other">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input placeholder="City" type="text" class="validate" name="city" required>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select name="state">
                                        <option value="" disabled selected>Choose State</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="New Delhi">New Delhi</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                    <label>State</label>
                                </div>
                                <div class="input-field col s12">
                                    <button class="btn-flat col s8 offset-s2">Register</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            @endif

            <!-- <footer class="col s12">
                <a class="col s12 m1 offset-m4" id="sponsors">Sponsors</a>
                <a class="col s12 m1" id="schedule">Schedule</a>
                <a class="col s12 m1" href="#" target="_blank">Teaser</a>
                <a class="col s12 m1" id="web">Web Team</a>
            </footer> -->

            <a href="https://www.facebook.com/iiitdm.jbp/" target="_blank" id="fb"><i class="fa fa-facebook"></i></a>
            <section class="home mask row">
                <section class="col s12 m10 head valign-wrapper">
                    <div class="col s4 m5 logo valign" style="margin-top:10px;">
                    <img src="/img/IIITDMJ%20LOGO.png">
                    </div>
                    <div class="col s8 m7 valign">
                        <h1 class="col s12 left-align heading">IIITDM Jabalpur</h1>
                    </div>
                </section>
                <section class="main col s12">
                    <h4 class="presents col s12 m2 offset-m5 wow zoomIn " data-wow-duration="0.75s" data-wow-delay="0.5s">Presents</h4>
                    <h3 class="col s12 m12 center-align wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">Inter IIIT Techno-Cultural Fest &#39;17</h3>
                    <h5 class="dates col s12 m3 offset-m7 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.75s">23<sup>rd</sup> - 26<sup>th</sup>  March</h5>
                    <div class="partner col s12">
                        <h5 class="col s12 wow zoomIn" data-wow-duration="0.75s" data-wow-delay="2.5s">In association with</h5>
                        <img src="/img/coollogo.png" class="wow zoomIn" data-wow-duration="1s" data-wow-delay="3s">
                    </div>
                    <div class="links">
                        <a class="link-card wow fadeIn" data-wow-duration="0.75s" data-wow-delay="4s" href="{{asset('IIITDMJ_Fest_Brochure.pdf')}}" target="_blank" download>
                            <img class="link-icon" src="/img/brochure.png">
                            <h5 class="link-text">Brochure</h5>
                        </a>
                        <a class="link-card wow fadeIn" data-wow-duration="0.75s" data-wow-delay="4s" href="{{ asset('Inter_IIIT_Rule_Book.pdf') }}" target="_blank" download>
                            <img class="link-icon" src="/img/book.png">
                            <h5 class="link-text">Rule Book</h5>
                        </a>
                    </div>
                </section>
            </section>
            <h1 class="header col s10 offset-s1 m2 offset-m5">About</h1>
            <section class="about container col">
                <p class="col s12">Indian Institute of Information Technology, Design and Manufacturing (IIITDM), Jabalpur is an institute of national importance is one of the premier emerging institutes of India. It shall be a Global Centre of excellence in engineering education and research by building itself as an Enterprise of Knowledge. It has been a launching pad for their journey of self-development and hence begins their participation in extra-curricular activities in campus and beyond.<br><br>
The Inter IIIT Techno-Cultural Fest, being launched this year, is an amalgam of two of inimitable fests of IIITDMJ, namely TARANG &amp; ABHIKALPAN. The fest will come as a vast pool of awe inspiring events enabling participants from all over India to promulgate their talent and explore their passion in the field of culture as well as technology.
</p>
            </section>
            <section class="club-nav nav-left">
                <div class="nav-option cultural" data-club-name="dance">
                    <img class="col" src="/img/icons/dance.png">
                    <h5 class="col nav-label">Dance</h5>
                </div>
                <div class="nav-option cultural" data-club-name="literary">
                    <img class="col" src="/img/icons/literary.png">
                    <h5 class="col nav-label">Literary</h5>
                </div>
                <div class="nav-option cultural" data-club-name="music">
                    <img class="col" src="/img/icons/music.png">
                    <h5 class="col nav-label">Music</h5>
                </div>
                <div class="nav-option technical" data-club-name="programming">
                    <img class="col" src="/img/icons/prog.png">
                    <h5 class="col nav-label">Programming</h5>
                </div>
                <div class="nav-option technical" data-club-name="astronomy">
                    <img class="col" src="/img/icons/astro.png">
                    <h5 class="col nav-label">Astronomy</h5>
                </div>
                <div class="nav-option technical" data-club-name="electronics">
                    <img class="col" src="/img/icons/electronics.png">
                    <h5 class="col nav-label">Electronics</h5>
                </div>
                <div class="nav-option technical" data-club-name="fmc">
                    <img class="col" src="/img/icons/fmc.png">
                    <h5 class="col nav-label">Film Making</h5>
                </div>
                <div class="nav-option technical" data-club-name="management">
                    <img class="col" src="/img/icons/management.png">
                    <h5 class="col nav-label">Management</h5>
                </div>
            </section>
            <section class="club-nav nav-right">
                <div class="nav-option cultural" data-club-name="drama" style="margin-top:200%">
                    <h5 class="col nav-label">Dramatics</h5>
                    <img class="col" src="/img/icons/drama.png">
                </div>
                <div class="nav-option cultural" data-club-name="arts">
                    <h5 class="col nav-label">Arts</h5>
                    <img class="col" src="/img/icons/arts.png">
                </div>
                <div class="nav-option technical" data-club-name="robotics" style="margin-top:100%">
                    <img class="col" src="/img/icons/robo.png">
                    <h5 class="col nav-label">Robotics</h5>
                </div>
                <div class="nav-option technical" data-club-name="automotive">
                    <img class="col" src="/img/icons/mechanical.png">
                    <h5 class="col nav-label">Automotive</h5>
                </div>
                <!-- <div class="nav-option technical" data-club-name="webix">
                    <img class="col" src="/img/icons/mechanical.png">
                    <h5 class="col nav-label">Webix</h5>
                </div> -->
                <div class="nav-option technical" data-club-name="photography">
                    <img class="col" src="/img/icons/photography.png">
                    <h5 class="col nav-label">Photography</h5>
                </div>
                <div class="nav-option technical" data-club-name="cad">
                    <img class="col" src="/img/icons/cad.png">
                    <h5 class="col nav-label">CAD</h5>
                </div>
            </section>
            <section class="events container col s12 m10 offset-m1 l10 offset-l1">
                <div class="main-btn-container col s3 offset-s2 cultural">
                    <div class="blur-mask col s12"></div>
                    <a class="main-btn col s12 cultural" data-genre="cultural">Cultural</a>
                </div>
                <div class="main-btn-container col s3 offset-s2 tech">
                    <div class="blur-mask col s12"></div>
                    <a class="main-btn col s12 technical" data-genre="technical">Technical</a>
                </div>
                <a class="close-btn col green-text">X</a>
                <div class="event-desc-container col s12 m10 offset-m1" id="dance">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#dancellennium" class="col s12 tab active">Dancellennium</a>
                        <a href="#fof" class="col s12 tab">Feet-of-Fire</a>
                        <a href="#carinosa" class="col s12 tab">Carinosa</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="dancellennium">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        The inter-collegiate group dance competition is a platform for the best dancing troops across India to flaunt their hypnotic moves. The competition invites all dance forms including hip hop, jazz, salsa, contemporary, folk dances.<br>
                        <h5 class="col s12">Rules-</h5>
                        1.  There shall be one team representing the college in cultural Fest Championship.<br>
2.  Minimum 5 and Maximum 40 members are allowed in a team , with at least 3 and at most 20 members on stage at any point during the performance.<br>
3.  Participants should get their songs/music in mp3 format in a pen-drive. Live music is not allowed. The name of track should be the participants name followed by the college name.<br>
4.  The time limit of the performance will be 10+1 minutes(10 minutes for performance and additional 1 minute to setup and clear the stage).Marks will be deducted for exceeding the time limit[20% deducted for exceeding 11 minutes and the team might be disqualified for exceeding 12 minutes based on judge’s discretion].<br>
5.  Accessories, costumes have to be arranged by the participants.<br>
6.  The performance should be in the cohesion with the integrity of the fest. The songs selected by the participants must not contain any foul language. Live animals and naked flame are not allowed. Violation of any of the above will lead to immediate disqualification.<br>
7.  Participants can use props suited to their performance which doesn’t cause damage in any other way.<br>
8.  Decision of the judges and will be considered as final and binding and will not be changed under any circumstances.
                        <h5 class="col s12">Coordinators</h5>
                        1. Shreyas pawar(8989034766)<br>
                        2. Rakshita Karmawat(9479875633)

                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="dancellennium" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-dancellennium" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="dancellennium">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="fof">
                        <h5 class="col s12">Solo Dance Competition</h5>
                        <p class="col s12">
                            A daring platform to showcase your moves and compete against the best dancers in the country, master the skill of expression, energy and emotions.
                            <h5 class="col s12">Rules-</h5>
                            1.  There will be two rounds: prelims and finals.<br>
2.  In the prelims, participants will perform a prepared routine of maximum 2 minutes. The performance must be a part of the routine that is to be presented in the second round.<br>
3.  In the finals, the participants have to perform a prepared routine of maximum 5 minutes including a prop (must not include any live animals or naked flame or water or breaking glasses).<br>
4.  Points will be deducted for exceeding the time limit.<br>
5.  Participants should get their songs/music in mp3 format in a pen-drive only. Live music is not allowed. The name of track should be the participants name followed by the college name .Live music is not allowed.<br>
6.  Participants can use props suited to their performance which doesn’t cause damage in any other way.<br>
7.  Decision of the judges and will be considered as final and binding and will not be changed under any circumstances. Violation of any of the above will lead to immediate disqualification.
                        <h5 class="col s12">Coordinators</h5>
                        1. Varnika Jain(9457673359)<br>  
                        2. Tushita Singh(9410005067)
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="solo_dance" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="carinosa">
                        <h5 class="col s12">Duet Dance Competition</h5>
                        <p class="col s12">
                            Come into an alliance with your partner if you can groove to the rhythm of your comrade and showcase your grace. You rely on physical skills and chemistry, but up until now, that chemistry’s been pretty heterosexual. Do so with all the chemistry in the world put in 2 souls.
                            <h5 class="col s12">Rules-</h5>
                            1.  The event will be conducted in two rounds that is prelims and finals.<br>
2.  Participants should get their songs/music in mp3 format in a pen-drive .The name of track should be the participants name followed by the college name .Live music is not allowed.<br>
3.  The event is strictly a duo dance competition and there should not be any extra person on the stage at any point during the performance, any combination of two people irrespective of the gender is allowed.<br>
4.  In the prelims, the couple will have to dance for a prepared routine of maximum 3 minutes; while in the finals the couple has to dance for a prepared routine of maximum 5 minutes [music on to music off]. Points will be deducted for exceeding the time limit.<br>
5.  Accessories, costumes have to be arranged by the participants.<br>
6.  The performance should be in the cohesion with the integrity of the fest. The songs selected by the participants must not contain any foul language. Live animals, brittle materials like glasses, water and naked flame are not allowed. <br>
7.  Participants can use props suited to their performance which doesn’t cause damage in any other way.<br>
8.  Decision of the judges will be considered as final and binding and will not be changed under any circumstances.<br>
9.  Indecent behaviour on stage shall not be tolerated. Violation of any of the above will lead to immediate disqualification.
                            <h5 class="col s12">Coordinators</h5>
                            1. Abhisek Pachauri(9479713514)  <br>
                            2. Pragati Saini(9407407593)
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="duet_dance" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-duet_dance" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="duet_dance">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="arts">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#shirt" class="col s12 tab active">T-Shirt Painting</a>
                        <a href="#waste" class="col s12 tab">Best out of Waste</a>
                        <a href="#poster" class="col s12 tab">Poster Making</a>
                        <a href="#paper" class="col s12 tab">Paper Cutting</a>
                        <a href="#doodling" class="col s12 tab">Doodling</a>
                        <a href="#rangoli" class="col s12 tab">Rangoli</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="shirt">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Let the colors flow, designs show and flash your imagination bright. Have you ever felt like designing your own clothes? Well here is your chance, don&#39;t let it go. Participate in Tshirt painting and who knows what you might end up with?
                        <h5 class="col s12">Rules-</h5>
                        1.  Materials Required - A4 Size Papers, Pencils, Cardboards, Paint Brushes, Acrylic Colors, Mono Color T-Shirts.<br>
2.  Any number of team (2-3 members) can participate.<br>
3.  Theme will be given on spot.<br>
4.  During first 30 minutes participants have to get their design approved by the judges.<br>
5.  Any number of attempts is allowed.<br>
6.  First 10 participants getting approved design will get the T-Shirt and all others will be disqualified.<br>
7.  3 hours event.<br>
8.  The design is to be made with limited number of colors which will be provided.
                        <h5 class="col s12">Coordinators</h5>
                        1. Chandrima Biswas(7225823118)<br>    
                        2. Tejaswi Kundur

                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="tshirt_painting" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-tshirt_painting" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="tshirt_painting">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="waste">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            There is a lot of stuff that we often throw out thinking it is useless, well it isn&#39;t. Here is your chance to steal the show with all the waste  you throw and take prizes away for sure,Participate in best out of waste and show us your creativity.
                            <h5 class="col s12">Rules-</h5>
                            1.  Materials Required - Icecream Sticks, Thermocol Sheet, Cardboards, Fevicol, Paper Tape, Newspapers.<br>
2.  Any number of team (2 members) can participate.<br>
3.  Theme will be given on spot.<br>
4.  During first 30 minutes participants have to collect waste and junk from around.<br>
5.  Some limited materials will be provided.<br>
6.  3 hours event.
                        <h5 class="col s12">Coordinators</h5>
                        1. Riya patel(9451741966)   <br>
                        2. Shivangi Pande
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="best_of_waste" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-best_of_waste" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="best_of_waste">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="poster">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            "A picture speaks more than a thousand words". Posters are the best way to describe a particular situation or circumstances in a minimalist manner . Each poster is unique in its own accord. So let the horses of your imagination run loose and participate in the poster making competition.
                            <h5 class="col s12">Coordinators</h5>
                            1.  Materials Required - A3 Size Sheets, Pencils, Cardboards, Paint Brushes, Pallets, Acrylic Colors, Markers.<br>
2.  Any number of participants (solo) can participate.<br>
3.  Theme will be given on spot.<br>
4.  3 hours event.<br>
5.  One can use only provided materials.<br>
6.  The design is to be made with limited number of colors which will be provided.
                            <h5 class="col s12">Coordinators</h5>
                            1. Shreyash(8989034766)
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="poster_making" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="paper">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            We have two hands, two eyes and 1 brain. They main purpose of these senses is to create. Create something unique with the materials provided and stand a chance to win awesome prizes. Paper is  simple yet powerful thing,so use this power bestowed on you and create!
                            <h5 class="col s12">Rules-</h5>
                            1.  Materials Required - A3 Size Sheets, Pencils, Paper Cutter, Scissors, Glue, Double sided tapes.<br>
2.  Any number of team (1-2 members) can participate.<br>
3.  Any composition on paper with provided materials.<br>
4.  3 hours event.
                            <h5 class="col s12">Coordinators</h5>
                            1. Gayatri Mech(7224915780)<br> 
                            2. Revati
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="paper_cutting" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-paper_cutting" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="paper_cutting">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="doodling">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            Let your thoughts flow on paper and doodle all you want, all you like, all you can. It's easy and fun,and surely it's something we all do in class, So why not take it to the next level? And there are prizes for grabs too!  So why wait, just participate!
                            <h5 class="col s12">Rules-</h5>
                            1.  Competition of doodling on paper.<br>
2.  Materials Required - Sheets, Pencils, Sketch Pens, Color pens, Markers.<br>
3.  Any number of participants (solo) can participate.<br>
4.  Theme will be given on spot.<br>
5.  3 hours event.

                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="doodling" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="rangoli">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            Traditional Indian art of Rangoli is a custom in our country since ages. It's the first form of art that most of us come across since our childhood. Festivals, events are all lightened up by the Rangolis. As we say, no event is complete without a rangoli, so let the freak flag fly and create an art takes everybody's breath away. Participate in rangoli and show us what you got!
                            <h5 class="col s12">Rules-</h5>
                            1.  Materials Required - Chalks, Color Powders, Filter.<br>
2.  Any number of team (2-4 members) can participate.   <br>
3.  Theme will be given on spot.<br>
4.  3 hours event.<br>
5.  The design is to be made with limited number of colors which will be provided.
                            <h5 class="col s12">Coordinators</h5>
                            1. Ameya Dabholkar(9833960250)<br>  
                            2. Anviksha Khunteta
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="rangoli" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-rangoli" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="rangoli">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="drama">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#monoact" class="col s12 tab active">Monoact</a>
                        <a href="#nukkad" class="col s12 tab">Nukkad</a>
                        <a href="#oneact" class="col s12 tab">One-Act</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="monoact">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        This is one man show . So pour your emotions and let the actor inside you cone out and say it all to the audience.
                        <h5 class="col s12">Rules-</h5>
                        1.  A participant can have a maximum of 3 helpers, one each for lights and sound and the third one could be incorporated in the act as per need.<br>
2.  Act can be in English, Hindi or Bilingual. Short phrases of other languages can be used.<br>
3.  Time Limit: 4-10 minutes.<br>
4.  Any kind of Fluid, live animals, flames, heavy objects or any material which has a possibility of damaging the stage is not allowed.<br>
5.  Points will be deducted on exceeding the time limit.<br>
6.  Any type of Inappropriate content or vulgarity will not be tolerated.<br>
7.  Stage Props should be mentioned beforehand and can be used only after the consent of the Coordinating Team.<br>
8.  The decision of the organizers shall be final and abiding.
                        <h5 class="col s12">Coordinators</h5>
                        1. Sarvesh (9479874672)
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="monoact" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="nukkad">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            Get up raise your voice and make the crowd think. Come and showcase the creativity in you against the odd of not having the stage set. There are many pressing issues that needs to be addressed, use the art of entertainment and convey the message to the community through this street play event.
                            <h5 class="col s12">Rules-</h5>
                            1.  Team Size: 8-24 (including CAs & music accompanists)<br>
2.  The teams must submit a short video (about 10 minutes) of the Street Play to be performed before the mentioned deadline. Teams must perform the extended version of the same Street Play which they have sent at the time of video submission.<br>
3.  Prelims Time Limit: 10 minutes.<br>
4.  Finals Time Limit: 15-30 minutes. Points will be deducted on exceeding the time limit.<br>
5.  Judging Criteria: Acting, Voice (Sync, modulation and diction) Screenplay, Script, Audience Interaction & overall impact.<br>
6.  The team size represents the number of people registered as a team. Only these shall be allowed to perform the Street play.<br>
7.  Music accompanists are included in the team number stated above. Maximum of 4 can be included in the team.<br>
8.  Teams are expected to perform at an open air venue with audience all around.<br>
9.  No electrical appliances shall be allowed during the performance whether inside or outside the circle of performance.<br>
10. Only live music is allowed. Teams will have to bring their own instruments- no instruments will be provided.<br>
11. Language of the performance should be Hindi/English or both. However, short sub passages in other languages are allowed.<br>
12. Any kind of fluid, live animals, flames, heavy objects or any material which has a possibility of damaging the stage is not allowed.<br>
13. Dry colours may be used during the play, but the teams have to clean the stage after their performance & the cleaning time will be included in the performance time.<br>
14. Any kind of plagiarism & profanity will lead to immediate disqualification.<br>
15. The decision of the judges will be final & abiding.
                            <h5 class="col s12">Coordinators</h5>
                            1. Anubhuti Gupta(9654329475)   <br>
                            2. Harshit Yadav
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="nukkad" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-nukkad" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="nukkad">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="oneact">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            We all have a story to tell, the stage is set and ready to see you showcasing the grace and fineness of your acting skills in the stage play event of this Inter IIIT Techno-Cultural Festival.
                            <h5 class="col s12">Rules-</h5>
                            1.  Participants should submit a hard copy of the script of the Play before the mentioned deadline.<br>
2.  Length of the play should be around 40 to 90 minutes, with a penalty for every extra minute. An extra time of 5 minutes will be given both for setting as well as clearing the stage.<br>
3.  A technical check (both lights and sound) will be provided to each team before the starting of the event.<br>
4.  Play could be in English, Hindi or Bilingual. Short phrases of other languages can be used.<br>
5.  There is no restriction to team size but the stage limit is restricted to a maximum of 8 actors. <br>
6. Teams are allowed to have one member each for lights, sound and spot. In addition to that a maximum of three backstage helpers are allowed. Their names should be mentioned separately at the time of Registration.<br>
7.  Any type of Inappropriate content or vulgarity will not be tolerated.<br>
8.  Stage Props should be mentioned beforehand and can be used only after the consent of the Coordinating Team.<br>
9.  The decision of the organizers shall be final and abiding.
                            <h5 class="col s12">Coordinators</h5>
                            1. Shivam Mishra(9479329126)
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="oneact" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-oneact" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="oneact">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="music">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#solo" class="col s12 tab active">Solo Singing</a>
                        <a href="#duet" class="col s12 tab">Duet Singing</a>
                        <a href="#unplug" class="col s12 tab">Unplugged</a>
                        <a href="#instrumental" class="col s12 tab">Solo Instrumental</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="solo">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Get ready to get mesmerized by the whimsical performances by the singing sensations of the country in the first ever Inter IIIT Techno-Cultural Festival. This will surely take you to the magical world of music.
                        <h5 class="col s12">Rules-</h5>
                        1.  Time limit:<br>
 • Prelims- 4 minutes including sound-check.<br> 
 • Finale- 5 minutes including sound-check.<br>
2.  Genre: Classical songs are NOT allowed. However, Semi-classical, Light Indian Music, Bollywood and Western songs (NO screaming/ growling) are allowed. <br>
3.  Language: All languages are allowed. <br>
4.  You may be asked to sing another song on judge’s demand.  <br>
5.  You may perform more than one song, provided they don’t exceed the time limit. <br>
6.  Karaoke is NOT allowed. <br>
7.  You may bring along two accompanying instrumentalists with you, or may play the instrument yourself, or use an Electronic Tanpura (under either case, you can’t use more than two instruments.). Only vocals shall be judged, however. <br>
8.  Judging Criteria: Voice Quality, Voice Modulation, Sur, Taal and Choice of Song.<br>
9.  Points may be deducted on exceeding the time limit or in case of not memorizing the lyrics.<br> 
10. You may perform the same composition as that of the prelims in the finale. <br>
11. The decision of the judges will be final & abiding
                        <h5 class="col s12">Coordinators</h5>
                        1. Vaishnavi (9479877960)<br>    
                        2. Sandhya Mishra<br>
                        3. Jonathan(9479874993)    


                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="solo_singing" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="duet">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            The audience will surely be enthralled by the nightingale volices of the duo.This event will portray plethora of music ranging from Sufi to Rock and Indian Classical to Folk. So Gear up to showcase your talent and set the stage on fire.
                            <h5 class="col s12">Rules-</h5>
                            1.  Only two contestants are allowed to participate as a team. The contestants may be from different institutes.<br> 
2.  Time limit: <br>
• Prelims-4 minutes including sound check.<br>
        • Finale- 5 minutes including sound check.<br>
3.  Genre: Classical songs are NOT allowed. However, Semi-classical, Light Indian Music, Bollywood and Western songs (NO screaming/ growling) are allowed.<br>
4.  You may perform the same composition as that of the prelims in the finale.<br>
5.  You may bring along two accompanying instrumentalists with you, or may play the instrument yourself, or use an Electronic Tanpura (under either case, you can’t use more than two instruments.). Only vocals shall be judged, however.<br> 
6.  You may perform a medley of songs, provided they don’t exceed the time limit.<br>
7.  Karaoke is NOT allowed. <br>
8.  All languages are welcome. <br>
9.  Judging Criteria: Composition, Sur, Taal, Compatibility between the contestants paired up.<br>
10. Points may be deducted on exceeding the time limit or in case of not memorizing the lyrics (vocalists) or using the aid of written notations (instrumentalists). <br>
11. The decision of the judges will be final & abiding.

                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="duet" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-duet" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="duet">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="unplug">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            The participants will surely blow your mind. It is a platform where the bands play acoustic instruments to fascinate the audience with their amusing performances.
                            <h5 class="col s12">Rules-</h5>
                            1.  Time limit: 15 minutes including sound check. (Both prelims and finale).<br>
2.  Your performance may be of any genre(No screaming) and language.<br>
3.  You may perform more than one songs provided they don’t exceed the time limit.<br>
4.  Number of band members should not fall below 3 and should not exceed 10. <br>
5.  You may use as many instruments as you wish. Please check the availability of the instrument with the organizing team prior to the event. In case of non-availability, you will have to arrange the instruments on your own.<br>
6.  Judging Criteria: Composition, Sur, Taal, Voice Quality and Modulation. <br>
7.  Points may be deducted on exceeding the time limit or in case of not memorizing the lyrics (vocalists) or using the aid of written notations (instrumentalists). <br>
8.  The decision of the judges will be final & abiding.<br>
9.  No Distortion is allowed on the Guitar and Synth and Sequences is not allowed.
                            <h5 class="col s12">Coordinators</h5>
                            1. Narosen<br>  
                            2. Ishaan Banerjee(9479875506)


                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="unplugged" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-unplugged" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="unplugged">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="instrumental">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            In music, an instrumental solo piece is a composition played by the performer. So get ready for some heart touching performances by the young and talented youth of the country.
                            <h5 class="col s12">Rules-</h5>
                            1.  Time limit:<br>
 • Prelims-4 minutes including sound check. <br>
 • Finale-5 minutes including sound check.<br>
2.  Genre: All genres are accepted.<br>
3.  You may perform the same composition as that of prelims in the finale.<br>
4.  You may use at max 2 instruments. <br>
5.  Judging Criteria: Composition, Sur, Taal and level of difficulty of composition. Original pieces will be given more weightage. <br>
6.  Points may be deducted on exceeding the time limit or in case of using the aid of written notations.<br>
7.  All Instruments (String, Wind, Percussion-Electronic as well as Acoustic) are allowed.<br>
8. The decision of the judges will be final & abiding.


                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="instrumental" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="literary">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#jam" class="col s12 tab active">JAM</a>
                        <a href="#spell" class="col s12 tab">Spell Bee</a>
                        <a href="#debate" class="col s12 tab">Debate</a>
                        <a href="#writing" class="col s12 tab">Creative Writing</a>
                        <a href="#gd" class="col s12 tab">Group Discussion</a>
                        <a href="#extemp" class="col s12 tab">Extempore</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="jam">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Witty, spontaneous, funny and smart? Just-A-Minute.<br>
No, you don’t have to speak for a minute on a topic for a minute.<br>
You have to vie for your chance to speak amongst the 6 people. Point out errors and you get to speak. Make too many of the same and you’re a sitting duck. <br>
Queen’s English is the only way to go. <br>
P.S. Flattering the God i.e. the JAM Master, helps a lot *winks*
                        <h5 class="col s12">Rules-</h5>
                        1.  The event will be open for individual participation only.<br>
2.  Depending on the total participation, preliminary rounds will be conducted with equally distributed groups to select participants for the final round.<br>
3.  The winner will be decided from the final round only.
                        <h5 class="col s12">Coordinators</h5>
                        1. Meru Vashisht(8989277087)<br>   
                        2. Anuj Khare
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="spell_bee" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc active" id="spell">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Unlike the traditional Spell Bee, Samvaad will host a game of words. Spelling a word correctly is impressive. Knowing what it means, how it went on to be that way and where it came from? That’s unparalleled. 
It’s exciting and challenging. Fun with thrill. Game of words.
                        <h5 class="col s12">Rules-</h5>
                        The Spell Bee to be conducted will not follow the traditional format of the Spell Bees. A sample Spell Bee will be provided to the participants to explain the likely format of the Spell Bee.<br>
1.  A team comprising of maximum two members will be eligible to participate in the Spell bee.<br> 
2.  Both the participating members constituting the team must be from the same institute.<br>
3.  The quiz will be conducted in two rounds: <br>
a)  The first round will be the qualifying round consisting of multiple written questions, through the results of which 8 teams will qualify to the second round i.e. stage round<br>
b)  The second round will be the stage round consisting of cyclic questions for each team. The winner of the spell bee will be decided solely through the result of the second round.<br>
For the second round only a maximum of two teams from each institute will qualify. The third team of the same institute will not be considered for the second round. The team (from a different) with the next highest score in the first round will be considered.<br>
4.  The Spell bee master holds the right to decide the round specific rules and scoring scheme to be declared at the beginning of the quiz.<br>
5.  All disputes and further specific rules will be decided by the Spelling Bee master.
                        <h5 class="col s12">Coordinators</h5>
                        1. Tathagat verma <br> 
                        2. Laveena Satwani (8989035197)
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="spell_bee" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-spell_bee" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="spell_bee">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="debate">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        In a world of changing opinions, political battles, extensive social awareness and endless conflicts of beliefs, how we stand by our ideals and principles matters the most. <br>
Open in both Hindi and English, Debate with its two rounds (Presidential and Parliamentary) will challenge the very ideals and principles that define a person. Moreover, how someone can hold their ground with their words and demeanour will be the highlight of the Debate hosted by Samvaad. 
                        <h5 class="col s12">Rules-</h5>
                        1.  Debate will be an individual event.<br>
2.  Debate will be conducted in Hindi and English separately.<br>
3.  The debate will be conducted in two rounds:<br>
a)  The prelims will allow each speaker to speak either for or against the motion for a maximum duration of 2 minutes and will be open to limited interjections at the end of the motion. <br>
The topic will be declared in advance of the event along with the motion assigned for each speaker (participants will have to register prior to the event on the registration link available on the Society page) decided through random draws.<br>
b)  A total of 6 speakers will qualify for the final round which will be conducted with the distribution of the speakers in two groups of 3 each. The groups will be randomly assigned. One team will be assigned for and the other against the motion. <br>
c)  The best speaker will be decided solely from their performance in the final round.<br>
4.  The conduct of the each participant should be civil. Misconduct through the use of abusive language or indecency to the judging committee will result in immediate disqualification from the event.
                        <h5 class="col s12">Coordinators</h5>
                        1. Tathagat Verma(8989571298)<br>
                        2. Anuj Khare(9479729685)

                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="debate" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="writing">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        A thought. An idea. From the mind to the physical world is inexplicable magic. A word spoken gets lost in the wind. A word written goes on and on.<br>
Writing is an art. Creativity in the midst of it makes a masterpiece.
Samvaad will host Creative Writing to witness masterpieces when the sky’s the limit. Open in both Hindi and English, the event will challenge the creativity and test the ability to express the thought.
                        <h5 class="col s12">Rules-</h5>
                        1.  Creative Writing will be an individual participation event.<br>
2.  The event will be open in both Hindi and English.<br>
3.  The submission can either be in the form of prose or an article.<br>
4.  The topic will be declared in advance (tentatively, three days prior to the commencement of the fest) and the submission will be online. <br>
5.  The deadline will be declared when the topic is declared. No entries will be accepted beyond the deadline.<br>
6.  Plagiarism of any sort, if found would result in disqualification of the participant.

                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="writing" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="gd">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        When conflicts of opinions, ideals and beliefs arise, an argument is impractical. No one listens, no one understands and no conclusion is reached to.
A discussion is vital to understand and to resolve the conflicts. Exhibiting your leadership qualities, personality, knowledge and power of expression, you could lead the group discussion to a desirable conclusion. Group Discussion hosted by Samvaad will be an example of that. 
                        <h5 class="col s12">Rules-</h5>
                        1. Group Discussion will follow the widely accepted format of Group Discussions as suggested my HR Managers for interviews.<br>
2. The dress code will be restricted to smart casuals.<br>
3. The participants will be distributed into groups equally depending on the total participation for the preliminary rounds.<br>
4. The best candidates from the preliminary rounds will proceed to the final round. The winner will be decided on their performance in the final round.
                        <h5 class="col s12">Coordinators</h5>
                        1. Animesh Sharma(9794064417)<br>  
                        2. Sparshi Jain
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="gd" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                    <div class="col s12 m9 event-desc" id="extemp">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Spur the moment by your presence of mind and get ready to amaze the audience by the awareness, confidence and fluency in language.
                        <h5 class="col s12">Rules-</h5>
                        1.  Extempore will be an individual participation event only.<br>
2.  The event will be conducted in two rounds:<br>
a)  The participant will be given 3 minutes to speak on a specific situation for the first round.<br>
b)  Depending on the performance of the prelims, 5 participants will proceed to the final round. The participants will be given 3 minutes to speak on a particular image provided to them.<br>
3.  The situation and image provided will be given on the spot and the participant will be given a minute to prepare before speaking.<br>
4.  The situation and image will be different for each candidate and the judging criteria will account for the variation in difficulty of the same.<br>
5.  No indecency/ vulgarity will not be tolerated and will lead to disqualification of the participant.
                        <h5 class="col s12">Coordinators</h5>
                        1. Mayank Sourabh (9479327707)<br> 
                        2. Ashish Gupta
                        </p>
                        @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="extempore" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        @endif
                    </div>
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="programming">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#hackathon" class="col s12 tab active">Hackathon</a>
                        <a href="#crypto" class="col s12 tab">CryptoCracker</a>
                        <a href="#coding" class="col s12 tab">Onsite Coding</a>
                        <a href="#minimal" class="col s12 tab">Minimal Poster</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="hackathon">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Who is a hacker? Hacker is an attitude of passionate curiosity. Hacker is a culture of excellence. Hacker is a mind set of innovation. Hackers built the internet. Hackers built the personal computer. Hackers built the mobile phone. Hackers built everything that is awesome today.
                        <h5 class="col s12">Coordinators</h5>
                        1. Arpit Garg (9407468488)<br>
                        2. Saurabh Joshi (9406816268)
                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="hackathon" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-hackathon" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="hackathon">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    <div class="col s12 m9 event-desc" id="crypto">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Are you passionate about brain teasing puzzles / mathematical computations ?<br>
Had a knap for unraveling puzzles and patterns in your childhood?<br>
Then come and compete with best hackers and puzzle solving geeks.<br>
Choose whatever means you need at your part to win.<br>
If you love breaking rules,passing system security this challenge is made for you.<br>
                        <h5 class="col s12">Coordinators</h5>
                        1. Anuraag Singh (9407296106)<br>
                        2. Saket Patel 
                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="cryptocracker" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-cryptocracker" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="cryptocracker">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    <div class="col s12 m9 event-desc" id="coding">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Are you a person who is crazy about algorithms and puzzles? Do words like Greedy, Divide and Conquer, Space-Time Complexity, AC, TLE, SIGSEGV sound familiar? While looking at a map you start thinking of ways to travel that will give you the shortest path (and thus saving you from expending less on the "inflamed" petrol). Or maybe, you think to schedule tasks in least slots in order to reduce your workload. Are you the one who thinks about a run time error when all others around ' you are worried about Dhoni's run out? Does your loop counter matter more to you than the crowd in a theatre counter? If yes, then this event is just for you. :D It is the place where optimization techniques, programming-analytical skills and hard work are all that matters!!.
                        <h5 class="col s12">Coordinators</h5>
                        1. Saurabh Joshi (9406816268)<br>
                        2. Naman Lal   <br>
                        3. Asutosh Rana    

                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="onsite_coding" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                    @endif
                    <div class="col s12 m9 event-desc" id="minimal">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Time to show off your graphic designing skills . If you think minimal is the new fad and if over the top posters bother you, then this is the event where you should surely be . If yes, then this event is just for you. <br>
What is Minimalism? Minimalism is a style that, in graphics, presents the object in question plainly, starkly and with a high degree of realism without extra decoration . Think of it as a representation of the thing itself without added artistic devices. 
                        <h5 class="col s12">Rules-</h5>
                        1. Adobe Photoshop, Illustrator can only be used.<br>
2. Number of posters will be 3-5.<br>
3. Individual entries are only accepted.
                        <h5 class="col s12">Coordinator</h5>
                        1. Nakul Arya (9407468488)    

                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="minimal" data-registered="0" data-event-type="single">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                    @endif
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="astronomy">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#exhibition" class="col s12 tab active">Exhibition</a>
                        <a href="#astroquiz" class="col s12 tab">Quiz</a>
                        <a href="#horizon" class="col s12 tab">Event Horizon</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="exhibition">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            We here at Astronomy Club of IIITDMJ heartiliy invite you all to come and feast your eyes on the wondours of space as you may have never see before,
to be awestruck by the most fascinating of science which you could not have comprehended in your wildest of dreams that governs the whole Universe,
to be amazed by the smallest of phenomena that you may have witnessed often enough but would not have been enlighted enough to appreciate the intricate beauty from its fascinating fabrication to it&#39;s mesmerizing denouement.
So we are eagarly waiting for you to join us and see the cosmos as we see it.
                            <h5 class="col s12">Coordinators</h5>
                            1. Prasham Prabhakar (8960288356)
                        </p>
                    </div>
                    <div class="col s12 m9 event-desc" id="astroquiz">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Like the last time and all other times we are again back with one of the Abhikalpan&#39;s most awaited quizing event 'THE ASTRONOMY QUIZ'.<br>
So don&#39;t miss a chance to be a part of this exhilarating quizing arena to battle with Light Saber, clearing through obstacles and to emerge as a VICTOR.                 <h5 class="col s12">Coordinators</h5>
                        1. Jasbir Singh (7587526034)<br>
                        2. Shlok Mohta (9407226268)
                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="astro_quiz" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-astro_quiz" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="astro_quiz">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    <div class="col s12 m9 event-desc" id="horizon">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        This year again we have prepared a stage for you to come forth with your genius, imagination, understanding of the laws governing the cosmos, to showcase a well defined solution of the engimatic situations we face with, with our endeavours to understand, to grow, to outreach our boundaries over and over gain.
                        <h5 class="col s12">Coordinators</h5>
                        1. Asish Gupta (9479318979)
                        2. Anuj Tiwari (9407465179)
                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="astro_horizon" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-astro_horizon" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="astro_horizon">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="electronics">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#circuit" class="col s12 tab active">Circuit Simulation</a>
                        <a href="#led" class="col s12 tab">LED Matrix</a>
                        <a href="#quizzard" class="col s12 tab">Quizzard</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="circuit">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Ever had fun doing electronics? You better get ready to revolutionize the &#39;excellence&#39; in you! You&#39;re gonna design a circuit to meet the required specifications using the given components in the most genius manner. Just got real! So, get ready to build circuits.
                        <h5 class="col s12">Rules-</h5>
                        1. There will be total 2 rounds. <br>
- First round will be qualifying round in which you have to use any simulation software and show the outputs. <br>
-Second round will be hardware making round in which actual application has to be made. <br>
2. Maximum of two students can form a team.<br>
3. The team members can be from different institutes or colleges.<br>
4. The organizers reserve the right to change any or all of the above rules as they deem fit. Change in rules, if any, will be highlighted on the website and notified to the registered participants.<br>
5. Organizers reserve the right to disqualify any team indulging in misbehaviour or violating any rules. In case of any disputes/discrepancies, the organizer's decision will be final and binding.<br>
6. Note that at any point of time, the latest information will be that which is on the website. The information provided in the pdf downloaded earlier may not be the latest.<br>
7. The circuit will be simulated in software and participants have to build it on board in the final round. <br>
8. They will be provided tools of electronics and Datasheet of the ICs used in the circuit. <br>
9. The participants must bring their own laptop for simulation and viewing the Datasheet.<br>
10. If any instrument gets damaged due to mishandling then that team will be immediately disqualified.
                        <h5 class="col s12">Coordinators</h5>
                        1. Tushar ParasRampuriya (9407407916)
                        2. Mamta Singh 

                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="circuit_simul" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-circuit_simul" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="circuit_simul">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col s12 m9 event-desc" id="led">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Ever stared at flames dancing in the fireplace? Got lost in them? Lost track of time? Led Matrix is an electronic analogue to those dancing flames. Programming LED Matrices to for animations that capture your imagination is an art, and if you have it in you, come and show us what you got. So, IIITDM Jabalpur brings you the challenge of showing your creative thinking with the use of technology.</p>
                        <h5 class="col s12">Rules-</h5>
                        1. Each team can consist of a maximum of 4 members. <br>
2. The team members can be from different institutes or colleges.<br>
  3. The decision of judges will be final and binding.<br>
4. The teams are allowed to use readymade microcontrollers, programmers, development boards and LED matrix module (8X8) or bigger.<br>
5. You should inform the organizers about the simulators you are using for testing before the event otherwise you may be disqualified if you hide information which is unfair.<br>
6. You can use any self-made calculators/Microsoft Excel to calculate the binary value of O/P pins but you are not allowed to use any software for automatic generation of the whole code based on the O/P to the matrix. You will be immediately disqualified if you fail to follow rule 3.<br>
7. The organizers reserve the right to change any or all of the above rules as they deem fit.Change in rules, if any, will be highlighted on the website and notified to the registered participants.<br>
8. Organizers reserve the right to disqualify any team indulging in misbehaviour or violating any rules. In case of any disputes/discrepancies, the organizer's decision will be final and binding.<br>
9. Note that at any point of time, the latest information will be that which is on the website. The information provided in the pdf downloaded earlier may not be the latest.
                        <h5 class="col s12">Coordinators</h5>
                        1. Yash Pratap Singh (8765187567)
                        2. Prashant Kumar (9479329223)
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="led_matrix" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-led_matrix" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="led_matrix">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col s12 m9 event-desc" id="quizzard">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        People have interest in gaining knowledge and experience more and more. You have to play with your knowledge on the paper. That&#39;s some good exercise for the brain, &#39;eh? So it’s challenge of knowledge and experience because challenge is the pathway to engagement and progress in our lives.
                        <h5 class="col s12">Rules-</h5>
                        1. Each team can consist of a maximum of 2 members or can take part alone.<br>
  2. The team members can be from different institutes or colleges.<br>
3. The decision of judges will be final.<br>
4. Question paper will be objective type and you have to tick the correct answer on the question paper itself.<br>
5. The organizers reserve the right to change any or all of the above rules as they deem fit.<br>
6. Change in rules, if any, will be highlighted on the website and notified to the registered participants.<br>
7. Organizers reserve the right to disqualify any team indulging in misbehavior or violating any rules. In case of any disputes/discrepancies, the organizer's decision will be final and binding.<br>
8. Note that at any point of time, the latest information will be that which is on the website. The information provided in the pdf downloaded earlier may not be the latest.
                        <h5 class="col s12">Coordinators</h5>
                        1. Sooraj Nair (9479328683)<br>
                        2. Megha Moondra   
                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="e_quizzard" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-e_quizzard" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="e_quizzard">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="fmc">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#dubsmash" class="col s12 tab active">Dubsmash</a>
                        <a href="#shortfilm" class="col s12 tab">Short Film Making</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="dubsmash">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        Dubsmash is a video messaging that lets users add soundtracks to videos recorded on their phones – often matching a clip of themselves performing a song or film scene with audio from the original.
                        <h5 class="col s12">Coordinators</h5>
                        1. Arpit Jain (8527941542)
                        </p>
                    </div>
                    <div class="col s12 m9 event-desc" id="shortfilm">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        ‘Pick up a camera. Shoot something. No matter how small, no matter how cheesy, no matter whether your friends and your sister star in it. Put your name on it as director. Now you're a director. Everything after that you're just negotiating your budget and your fee. James Cameron This is an event for all the visionaries who want to make it big in the film industry, and don’t worry, we make sure your fee is worth it.
                        <h5 class="col s12">Rules-</h5>
                        1. The team size can be 10 to 15 people including actors.<br>
2. The time range for the short film will be minium 2 min to maximum 8 minutes. <br>
3. The movie should either be in Hindi or English or both. No other languages are permitted.<br>
4. You have to upload the video on google drive and just share the link with us.<br>
5. The video may be taken with any device. <br>
6. At least one of these situations has to be included in the short film. <br>
7. It is imperative that at least one of the actors in the short film registers at the control tent to confirm the authenticity of the short film or do online registration and send your video along with abhikalpan id.<br>
8. Abhikalpan fest will not be responsible for any issues arising out of non-compatibility of the videos. <br>
9. Obscenity of any kind is not allowed and shall lead to disqualification. <br>
10. The decision of the judge's and the organizing team will be final and binding.
                        <h5 class="col s12">Coordinators</h5>
                        1. Shubham Chak (8989903725)
                        </p>
                    </div>
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="management">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#bmc" class="col s12 tab active">Brand Presentation</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="bmc">
                        <h5 class="col s12">Coordinators</h5>
                        1. Daniel Sinha (9407407695)
                    </div>
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="robotics">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#robowar" class="col s12 tab active">Robowar</a>
                        <a href="#minefield" class="col s12 tab">Minefield Escape</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="robowar">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        <h5 class="col s12">Description</h5>
                                           Imagine yourself in a situation when your country is surrounded by enemies on all sides and only you can rescue it to safety. It is your skills and knowledge that can beat the enemy out of your nation. It is time for a Robowars where either you crush away the enemy’s bot or get your own sliced into pieces.
So get ready to fight for your life, to fight for your pride, to fight for your glory and let your bot shine to the entire world.<br>
                                           <h5 class="col s12">Task</h5>
                                           Design and construct a wired or wireless remote controlled robot capable of fighting a one on one tournament.<br>

                                           <h5 class="col s12">Rules</h5>

                                           <h5 class="col s12">Abstract</h5>

The written abstract should be prepared on the following lines: <br>
The weapon systems and power supply method should be explained in detail. <br>Picture(s) showing these should be attached. <br>
In case of wireless remote, functioning of wireless remote and the frequency or any other wireless module used for wireless remote must be explained in detail. <br>
Description of any unusual advantageous mechanism used. <br>The specifications of all the components used, including motors, suspension springs, remote controller, wires, battery etc. have to be mentioned.<br>
You can email the portfolio minus the video and send the video later. <br>This will make sure that at least the abstract part of your portfolio reaches us before the deadline. <br>
An email will be sent to the team leader confirming the receipt of the entry.<br>

                                           <h5 class="col s12">Video Abstract</h5>

The video should be of at least 1 minute with the unedited clip showing the machine performance to the fullest. <br>All destructive mechanism(s) being used must be shown working. <br>
It is not necessary to explain the mechanisms in the video<br>
Please note that this video abstract will not be the sole criteria for selection of your robot to perform at Robowars. <br>

                                           <h5 class="col s12">Safety Rules</h5>

Compliance with all event rules is mandatory. <br>It is expected that competitors stay within the rules and procedures of their own accord and do not require constant policing. <br>
If you have a robot or weapon design that does not fit within the categories set forth in these rules or is in some way ambiguous or borderline, please contact the event organizers. <br>Safe innovation is always encouraged, but surprising the organizers with your brilliant exploitation of a loophole may cause your robot to be disqualified before it even competes.<br>
Each event has safety inspections. <br>It is at their sole discretion that your robot is allowed to compete .<br>
All weapons must have a safety cover on any sharp edges. <br>
All participants build and operate robots at their own risk.<br>
All the resources provided at the time of competition from the organizers should be strictly used only after the consent of the organizers. <br>
Once the robots have entered into the arena, no team member can enter into the arena at any point of time. In case if a fight has to be halted in between and some changes have to be done in the arena or condition on the robot(s), it will be done by organizers only. <br>

                                           <h5 class="col s12">Specifications</h5>
                                           <h5 class="col s12">Dimensions and Fabrications</h5>

The machine should fit in a box of dimension 350mm x 350mm x 350 mm (l x b x h) at any given point during the match. <br>The external device used to control the machine or any external tank is not included in the size constraint. <br>
The machine should not exceed 12 kg of weight including the weight of pneumatic source/tank. <br>Weight of remote controller will not be counted.<br> Power Supply can be external or on-board.<br>

                                           <h5 class="col s12">Mobility</h5>

All robots must have easily visible and controlled mobility in order to compete. Methods of mobility include: <br>
Rolling (wheels, tracks or the whole robot). <br>
Non-wheeled robots having no rolling elements in contact with the floor and no continuous rolling or cam operated motion in contact with the floor, either directly or via a linkage. <br>Linear-actuated legs and novel non-wheeled drive systems come under this category. <br>
Jumping and hopping is not allowed. <br>
Flying (using airfoil, helium balloons, etc.) is not allowed.<br>

                                           <h5 class="col s12">Robot Control Requirements</h5>
The machine can be controlled through wireless or wired remote. Power supply can be external or on board. Refer below for further details on battery and power. <br>
In case of wireless remote, there should be binding capability between transmitters and receivers. <br>The remotes with such facility will only be allowed. <br>The team must have at least two frequency wireless remote control circuit or two dual control circuits<br>
Remote control systems from toys might be used. Remote control systems available in the market may also be used. <br>
Nonstandard or self-made remote control systems must first be approved by the organizers. <br>

                                           <h5 class="col s12">Battery and Power</h5>

The machine can be powered electrically only. Use of an IC engine in any form is not allowed. <br>
The Battery and other power source can be provided by the institute in case the team has no other source of power supply.<br>
On board batteries must be sealed, immobilized-electrolyte types (such as gel cells, lithium, NiCad, NiMH, or dry cells). <br>
The electric voltage between 2 points anywhere in the machine should not be more than 24V DC at any point of time. <br>
It is suggested to have extra battery ready and charged up during competition so that on advancing to next level, you don’t have to wait or suffer due to uncharged battery. If teams don’t show up on allotted slot, they will be disqualified. <br>
Change of battery will not be allowed during the match.<br>

                                           <h5 class="col s12">Pneumatics</h5>

Robot can use pressurized non-inflammable gases to actuate pneumatic devices. <br>Maximum allowed outlet nozzle pressure is 6 bar. <br>The storage tank and pressure regulators used by teams need to be certified and teams using pneumatics are required to produce the Safety and Security letters at the Registration Desk at the venue. <br>Failing to do so will lead to direct disqualification. <br>
The maximum pressure in cylinder should not exceed the rated pressure at any point of time. <br>
All pneumatic components on board a robot must be securely mounted. <br>

                                           <h5 class="col s12">Hydraulics</h5>

Robot can use non-inflammable liquid to actuate hydraulic devices e.g. cylinders. <br>
All hydraulic components on-board must be securely mounted. <br>Special care must be taken while mounting pump, accumulator and armour to ensure that if ruptured direct fluid streams will not escape the robot. <br>
All hydraulic liquids are required to be non-corrosive and your device should be leak proof. Maximum allowed pressure is 6 bars. <br>

                                           <h5 class="col s12">Weapon Systems</h5>

Robots can have any kind of magnetic weapons, cutters, flippers, saws, lifting devices, spinning hammers etc. as weapons with following exceptions and limitations: <br>
Liquid projectiles.<br>
Any kind of inflammable liquid.<br>
Flame-based weapons. <br>
Any kind of explosive or intentionally ignited solid or potentially ignitable solid. <br>
Nets, tape, glue, or any other entanglement device. <br>
High power magnets or electromagnets. <br>
Radio jamming, Tasers, tesla coils, or any other high-voltage device. <br>
Tethered or untethered projectiles. <br>
Spinning weapons which do not come in contact with the arena at any point of time are allowed. <br>In no case should the arena be damaged by any bot.<br> The competition will be played on a knock-out basis. <br>


                                           <h5 class="col s12">Judging</h5>
                                           <h5 class="col s12">Criteria for Winning</h5>

A robot is declared victorious if its opponent is immobilized. <br>
A robot will be declared immobile if it cannot display linear motion of at least one inch in a timed period of 30 seconds. <br>A bot with one side of its drivetrain disabled will not be counted out if it can demonstrate some degree of controlled movement.<br>In case both the robots remain mobile after the end of the round then the winner will be decided subjectively.<br>
A robot that is deemed unsafe by the judges after the match has begun will be disqualified and therefore declared the loser.<br>The match will be immediately halted and the opponent will be awarded a win.<br>
If a robot is thrown out of the arena the match will stop immediately, and the robot still inside the arena will automatically be declared as the winner.<br>
Robots cannot win by pinning or lifting their opponents.<br>Organizers will allow pinning or lifting for a maximum of 20 seconds per pin/lift then the attacker robot will be instructed to release the opponent. If, after being instructed to do so, the attacker is able to release but does not, their robot may be disqualified.<br>If two or more robots become entangled or a crushing or gripping weapon is employed and becomes trapped within another robot, then the competitors should make the timekeeper aware, the fight should be stopped and the robots separated by the safest means.<br>
Points will be given on the basis of aggression, damage, control and strategy.<br>
Aggressiveness – Aggressiveness is judged by the frequency, severity, boldness and effectiveness of attacks deliberately initiated by the robot against its opponent.<br>If a robot appears to have accidentally attacked an opponent, that act will not be considered Aggressiveness.<br>
Control – Control means a robot is able to attack an opponent at its weakest point, use its weapons in the most effective way, and minimize the damage caused by the opponent or its weapons.<br>
Damage – Through deliberate action, a robot either directly or indirectly reduces the functionality, effectiveness or defensibility of an opponent.<br>Damage is not considered relevant if a robot inadvertently harms itself.<br>

Note: Qualification of a robot to next level is subjective and totally on the decision of the judges.<br>A robot winning in a round against its opponent doesn’t guarantee its entrance into the next round.<br>If the judges found the winner robot incompetent to enter into the next round, it may get disqualified. Judges can disqualify both the robots of a match from advancing to the next round. All the decisions taken by the judge will be final and binding to all. Any queries afterwards will not be entertained.<br>

                                           <h5 class="col s12">Team Specifications</h5>

Any team can participate in Robowars. <br>A team may consist of a maximum of 4 participants. <br>These participants can be from same or different institutes. <br><br>
Team Name:<br>Every team must have a name which must be unique. Robowars reserves the right to reject entries from any Team whose name it deems inappropriate, offensive or conflicting. Organizers must be notified during if a Team's name has been changed.
Team Representative: <br>Each team must specify their Team Representative (Leader) at the time of registration on the website. All important communications between us and the registered teams will be done through their Team Representative. The Team Representatives must submit valid contact details (phone no., email ID etc.) at the time of registration. <br><br>
NOTE: During any kind of conversation, registration, communication, mails or submissions the team must identify themselves by their Team ID only provided at the time of registration and not by your team name. Please do not use your team name as your identification in any kind of communication with us.


                                           <h5 class="col s12">Certificate Policy</h5>

Certificate of Excellence will be given to all the winners. <br>
Certificates of Participation will be given to all the teams who qualify two rounds of the competition. <br>
The teams which get disqualified due to disobeying any of the competition rules will not be considered for the certificate.<br>


                                           <h5 class="col s12">Coordinators</h5>
                                            1. Vishal Agarwal (9479772972)<br>
                                            2. Sachin Kumar Gupta (9424662293)


                        </p>
                    </div>
                    @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="robowar" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-robowar" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="robowar">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col s12 m9 event-desc" id="minefield">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        <h5 class="col s12">Description</h5>
                                           You are a field operative for RAW. You have to make an escape for nemesis ground but it’s a mine field. But using advanced technology developed by DRDO you have sight WHITE highlighted path which will safely take you to your extraction point. So get on your best of LFR’s to get going on this final objective of your mission. But take care to reach the extraction point in time as the nemesis guardians might be following onto your lead. Everything depends on how precisely and efficiently you follow your path as you don’t want to get BLOWN….<br>
                                           <h5 class="col s12">Task</h5>
                                           Teams have to build an autonomous bot (line following bot) which can detect the white lines on the arena and follow the same to complete the task.<br>

                                           <h5 class="col s12">Rules</h5>

                                           <h5 class="col s12">Specifications</h5>
                                           <h5 class="col s12">Dimensions and Fabrications</h5>
                                           1. The machine should fit in a box of dimension 200mm x 200mm x 200 mm (l x b x h) at any given point during the match. <br>
                                           2. There is no weight limit for the bot. Power Supply can be external or on-board.<br>

                                           <h5 class="col s12">Robot Control Requirements</h5>
                                           No remote control mechanism is required for this robot. The robot should be fully autonomous. Any wired or wireless remote is not allowed.<br>
                                           <h5 class="col s12">Battery and Power</h5>
                                           1.The electric voltage between 2 points anywhere in the machine should not be more than 12V DC at any point of time. <br>
                                           2. The teams can use on-board power supply or can use adapters for power supply.<br>
                                           3. Teams have to bring their own power supply. No power supply will be provided for this event.<br>
                                           It is suggested to have extra battery ready and charged up during competition so that on advancing to next level, you don’t have to wait or suffer due to uncharged battery. <br>
                                           If teams don’t show up on allotted slot, they will be disqualified. <br>

                                           <h5 class="col s12">Judging</h5>
                                           <h5 class="col s12">Criteria for Winning</h5>
                                           For the first round, teams have to traverse the whole arena and on the basis of the time taken by the teams, they are shortlisted for the next round.<br>
In the next round again the same procedure will be done and the team completing the tasks in minimum time will be declared as winner.<br>

                                           <h5 class="col s12">Team Specifications</h5>

Any team can participate in this competition. <br>A team may consist of a maximum of 3 participants. <br>These participants can be from same or different institutes. <br>
Team Name: Every team must have a name which must be unique.<br> We reserves the right to reject entries from any Team whose name it deems inappropriate, offensive or conflicting. <br>Organizers must be notified during if a Team's name has been changed. <br>
Team Representative: Each team must specify their Team Representative (Leader) at the time of registration on the website. All important communications between us and the registered teams will be done through their Team Representative. The Team Representatives must submit valid contact details (phone no., email ID etc.) at the time of registration. <br><br>
NOTE: During any kind of conversation, registration, communication, mails or submissions the team must identify themselves by their Team ID only provided at the time of registration and not by your team name. Please do not use your team name as your identification in any kind of communication with us.

                                           <h5 class="col s12">Certificate Policy</h5>

Certificate of Excellence will be given to all the winners. <br>
Certificates of Participation will be given to others. <br>
The teams which get disqualified due to disobeying any of the competition rules will not be considered for the certificate.<br>

                                           <h5 class="col s12">Coordinators</h5>
                                           1. Vishal Garg (9479810936)

                        </p>
                    </div>
                </div>
                @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="minefield" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-minefield" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="minefield">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                <div class="event-desc-container col s12 m10 offset-m1" id="automotive">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#robothon" class="col s12 tab active">Robothon</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="robothon">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                        <h5 class="col s12">Description</h5>
                                           The world believes in the survival of the fittest and it is in your hands to prove how fit your country men are. But this time the criterion is a bit different; you need to show the world how efficient your designed bot is. So pull up your socks and get ready to put forward a show that shall vouch for your mental and your bot’s physical speed. Just go onto the racing track and get to experience the thrill of a Robothon.<br>
                                           <h5 class="col s12">Task</h5>
                                           A robot must begin from the Start line, proceed to different hurdles, execute turns, and then reach to the Finish line. The race ends when the robot has completely crossed the end line. <br>

                                           <h5 class="col s12">Rules</h5>
                                           <h5 class="col s12">Rounds</h5>
There will be two rounds in the game<br>

                                           <h5 class="col s12">Round 1 (Elimination Round):</h5>
 Only one team will be there in this round.<br>
Time limit will be decided on the day of the event, there will negative points for exceeding the time limit. <br>
 Obstacles will be placed on the arena. <br>
 There will be no negative point if robot touches the border.<br>
 The criteria for the negative points will be disclosed on the day of the event.<br>
 8 teams will make it to the round 2 (depends on the number of teams). <br>
                                           <h5 class="col s12">Round 2:</h5>
The team completing the same task in minimum time out of first round selected teams will be the winner.<br>

                                           <h5 class="col s12">Specifications</h5>
                                           <h5 class="col s12">Robot Specifications</h5>
Robot dimension and fabrication<br>
Each bot should fit in a box of dimension 300 mm x 300 mm x300 mm (l*b*h) at the start of the match. <br>
The external device used to control the machine is not included in the size constraint. <br>
Any machine component should not be detached (intentionally) during any point of the bout.<br>

                                           <h5 class="col s12">Robot Control Requirements</h5>
The bot can be controlled through wired or wireless remote. <br>
In case of wired bot, minimum length of wire should be 6 meter. Also the wire should remain slack at any instant during the bout.<br>
All the wires coming out of the bot should be stacked as a single unit.<br>
The bots using wireless remote must at least have a two frequency remote control circuit or two dual control circuits which may be interchanged before the start of the race to avoid frequency interference with other teams. <br>
Remote control systems that are readily available in the market may also be used.<br>

                                           <h5 class="col s12">Battery &amp; Power</h5>
The machine can be powered electrically only. <br>
In case of wired bots, teams can use external batteries.<br>
In case of wireless bots, batteries should be placed on the bot.<br>
The electric voltage between 2 points anywhere in the machine should not be more than 18V DC at any point of time and net current flowing through the circuit should not be more than 10A.<br>



                                           <h5 class="col s12">Judging</h5>
                                           <h5 class="col s12">ROUND 1-</h5>8 teams with best timings will be selected.<br>
                                           <h5 class="col s12">ROUND2-</h5>The team completing the task with best timing will be the winner.<br>

                                           <h5 class="col s12">Team Specifications</h5>

Any team can participate in this event. <br>A team may consist of a maximum of 4 participants. <br>These participants can be from same or different institutes.<br><br>
Team Name: <br>Every team must have a name which must be unique. We reserves the right to reject entries from any Team whose name it deems inappropriate, offensive or conflicting. Organizers must be notified during if a Team's name has been changed. <br>
Team Representative: <br>Each team must specify their Team Representative (Leader) at the time of registration on the website. All important communications between us and the registered teams will be done through their Team Representative. The Team Representatives must submit valid contact details (phone no., email ID etc.) at the time of registration. <br><br>
NOTE: During any kind of conversation, registration, communication, mails or submissions the team must identify themselves by their Team ID only provided at the time of registration and not by your team name. Please do not use your team name as your identification in any kind of communication with us.


                                           <h5 class="col s12">Certificate Policy</h5>

Certificate of Excellence will be given to all the winners. <br>
Certificates of Participation will be given to all the teams who qualify two rounds of the competition. <br>
The teams which get disqualified due to disobeying any of the competition rules will not be considered for the certificate.<br>



                                           <h5 class="col s12">Coordinators</h5>
                                            1. Shivam Vikram Singh (9424037616)<br>
                                            2. Mohammad Abdul Ahad (9849093503)

                        </p>
                    </div>
                </div>
                @if(Auth::check())
                        <div class="btn-container col s12 m9">
                            <button class="register col s6 m5 btn" data-event-id="robothon" data-registered="0" data-event-type="group">Register</button>
                            <!-- <button class="package col s6 m5 offset-m2 btn">View Package</button> -->
                        </div>
                        <div id="modal-robothon" class="group-modal modal col s12 m6">
                            <div class="modal-content row">
                                <h4 class="col s12">Group Event</h4>
                                <div class="group-options col s12">
                                    <h6 class="col s12">This is a group event....</h6>
                                    <button class="create-group btn-flat col s8 offset-s2">Create Group for this Event</button>
                                </div>
                                <div class="group-details col s12" style="display:none">
                                    <form class="group_details">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="robothon">
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_name" id="group_name" placeholder="Enter Group Name" required="true">
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <input type="text" class="validate" name="group_college" id="group_college" placeholder="College" value="{{Auth::user()->college}}" required="true">
                                        </div>
                                        <div class="members input-field col s12">
                                            <input type="text" class="col s8 validate" name="members[]" id="group_member" placeholder="{{ Auth::user()->fest_id }} (Team Leader)" value="{{ Auth::user()->fest_id }}">
                                            <button class="save-member btn-flat col s3 offset-s1">Save</button>
                                        </div>
                                        <button class="add-member btn-flat col s10 offset-s1 m3 offset-m2">Add Member</button>
                                        <button type="submit" class="reg-member btn-flat col s10 offset-s1 m3 offset-m2">Create Group</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                <div class="event-desc-container col s12 m10 offset-m1" id="photography">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#macro" class="col s12 tab active">Online Photography</a>
                        <a href="#face" class="col s12 tab">Exhibition</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="macro">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            <h5 class="col s12">Coordinators</h5>
                            1. Anala Hari Krishna (7587526032)<br>
                            2. Sai Pawan Teja  
                        </p>
                    </div>
                    <div class="col s12 m9 event-desc" id="face">
                        <h5 class="col s12"></h5>
                        <p class="col s12">
                            <h5 class="col s12">Coordinators</h5>
                            1. Aravapalli Bhavya Sri (9479935573)
                            2. Teki Tanay Kumar (9406816046)

                        </p>
                    </div>
                </div>
                <div class="event-desc-container col s12 m10 offset-m1" id="cad">
                    <div class="col s12 m3 event-name-tabs">
                        <a href="#cad" class="col s12 tab active">CAD Sutra</a>
                    </div>
                    <div class="col s12 m9 event-desc active" id="cad">
                        <p class="col s12">
                            <h5 class="col s12">Coordinators</h5>
                            1. Fakir Mohan Patra (9479328864)
                        </p>
                    </div>
                </div>
            </section>
            <section class="contact container col s12 m10 offset-m1">
                <div class="contact-card-container col s12">
                    <h4 class="col s12 m10 offset-m1">For any queries contact -</h4>
                    <div class="contact-card col s4 m3">
                        <h4 class="col s10 offset-s1">Mohit Kumawat</h4>
                        <h5 class="col s10 offset-s1">+91-9424973245</h5>
                        <i class="col s12 fa fa-envelope"> <span>mohitkumawat@iiitdmj.ac.in</span></i>
                    </div>
                    <div class="contact-card col s4 m3">
                        <h4 class="col s10 offset-s1">Aparimita Singh</h4>
                        <h5 class="col s10 offset-s1">+91-8989077837</h5>
                        <i class="col s12 fa fa-envelope"> <span>aparimitasingha@iiitdmj.ac.in</span></i>
                    </div>
                    <div class="contact-card col s4 m3">
                        <h4 class="col s10 offset-s1">Rohit Suman</h4>
                        <h5 class="col s10 offset-s1">+91-9406816046</h5>
                        <i class="col s12 fa fa-envelope"> <span>rohitkumarsuman@iiitdmj.ac.in</span></i>
                    </div>
                    <div class="contact-card col s4 m3">
                        <h4 class="col s10 offset-s1">Sunny Rajak</h4>
                        <h5 class="col s10 offset-s1">+91-9589190253</h5>
                        <i class="col s12 fa fa-envelope"> <span>sunnyrajak@iiitdmj.ac.in</span></i>
                        
                    </div>
                </div>
            </section>
            <section class="team container col s12">
                <div class="team-nav col s12 m3">
                    <a class="team-tab col s12 active" href="#faculty">Faculty Advisors</a>
                    <a class="team-tab col s12" href="#event">Event Management and Infra</a>
                    <a class="team-tab col s12" href="#marketing">Marketing and Sponsorship</a>
                    <a class="team-tab col s12" href="#design">Design and Development</a>
                    <a class="team-tab col s12" href="#helpdesk">Helpdesk and Security</a>
                    <a class="team-tab col s12" href="#public">Public Realtions</a>
                    <a class="team-tab col s12" href="#hospitality">Hospitality</a>
                    <a class="team-tab col s12" href="#finance">Finance and Accounts</a>
                </div>
                <div class="team-container col s12 m9">
                    <h4 class="col s12">Faculty Advisors</h4>
                    <div class="team-card-container col s12 active" id="faculty">
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Rajwani</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Rajwani</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Rajwani</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Rajwani</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Rajwani</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Rajwani</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Rajwani</h5>
                        </div>
                    </div>
                    <div class="team-card-container col s12" id="event">
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Abhay Singh Thakur</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Jugal Rewar</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Vipul Gupta</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Praneet Bhatnagar</h5>
                        </div>
                    </div>
                    <div class="team-card-container col s12" id="marketing">
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Ankit Sahu</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Mohit Kumawat</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">G. Arun Kumar</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Shubham Khillarkar</h5>
                        </div>
                    </div>
                    <div class="team-card-container col s12" id="design">
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Rajwani</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Samay Jain</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">U. Snehalekha</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">G. Shobab</h5>
                        </div>
                    </div>
                    <div class="team-card-container col s12" id="helpdesk">
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Rohit Suman</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Raghuram</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">M. Sushant</h5>
                        </div>
                    </div>
                    <div class="team-card-container col s12" id="public">
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Aditi Bhatt</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Aparimita Singh</h5>
                        </div>
                    </div>
                    <div class="team-card-container col s12" id="hospitality">
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Sunny Rajak</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Aparna Wahane</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">K. Sai Teja</h5>
                        </div>
                    </div>
                    <div class="team-card-container col s12" id="finance">
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Sumanth Chaudhary</h5>
                        </div>
                        <div class="team-card col s12 m3">
                            <div class="card-image col s12">
                                <img src="/img/me.jpg">
                            </div>
                            <div class="card-link col s12">
                                <a href="#" class="fa fa-envelope"></a>
                            </div>
                            <h5 class="col s12">Atul Dholpure</h5>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        
        <script src="/js/jquery-2.1.4.js"></script>
        <script src="/js/materialize.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/custom.js"></script>
        @if(Auth::check() && Auth::user()->city == null)
            <script>
                $(function(){
                    $('#login').openModal({dismissible : false});
                    $('.login-modal .modal-content h4').html('User Details').fadeIn();
                    $('.login-modal .modal-content .login-form, .login-modal .modal-content .register-btn-container').fadeOut();
                    $(document).off('click','.lean-overlay');
                    $('.login-modal .details-form').fadeIn();
                    $('.login-modal .details-form #festid').val('{{ Auth::user()->fest_id }}');
                    $('.login-modal .details-form #name').val('{{ Auth::user()->name }}');
                });  
            </script>
        @endif

        <script>
            var reg_events_single = {!!html_entity_decode($reg_events_single)!!};
            var reg_events_group = {!!html_entity_decode($reg_events_group)!!};
            var reg_btn = $('.events .event-desc button.register');

            console.log(reg_events_single);
            console.log(reg_events_group);

            for(i in reg_events_single)
                $('.events .event-desc').find("[data-event-id='" + reg_events_single[i] + "']").attr('data-registered',1).html('Registered').prop('disabled',true);
            for(i in reg_events_group)
                $('.events .event-desc').find("[data-event-id='" + reg_events_group[i] + "']").attr('data-registered',1).html('Registered').prop('disabled',true);
        </script>
    </body>

</html>