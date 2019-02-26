<?php 

 

  include('/home3/j6uj8460/servers/registerServer.php');
  if (isset($_SESSION['email_idB'])) {
    header('location: Profile/business/profile_home_business.php');
  }
  if (isset($_SESSION['email_idF'])) {
    header('location: Profile/marketingFirms/profile_home_firm.php');
  }
  if (isset($_SESSION['email_id'])) {
    header('location: Profile/salesProfessional/profile_home_sales.php');
  }


 ?>
<!DOCTYPE html>
<html>
<head lang="en">

	<meta charset="utf-8">
    <title>Sales and Marketing Firms</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <script type='text/javascript'>

       
      //Code for showing speciality and checkboxes
      var expanded = false;
      function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if(!expanded) {
              checkboxes.style.display = "block";
              expanded = true;
            } else {
              checkboxes.style.display = "none";
              expanded = false;
            }

          }

      //Code for showing languages and checkboxes
      var expanded2 = false;
      function showLanguageCheckboxes() {
            var checkboxes = document.getElementById("languagescheckboxes");
            if(!expanded2) {
              checkboxes.style.display = "block";
              expanded2 = true;
            } else {
              checkboxes.style.display = "none";
              expanded2 = false;
            }

          }

      //Code for displaying other means on contact
      function contactinfoCheck() {
        if (document.getElementById('skypeCheck').checked) {
          document.getElementById('ifskype').style.display = 'block';
        }
        else {
          document.getElementById('ifskype').style.display = 'none';
        }

        if (document.getElementById('whatsappCheck').checked) {
          document.getElementById('ifwhatsapp').style.display = 'block';
        }
        else {
          document.getElementById('ifwhatsapp').style.display = 'none';
        }


        if (document.getElementById('imoCheck').checked) {
          document.getElementById('ifImo').style.display = 'block';
        }
        else{
          document.getElementById('ifImo').style.display = 'none';
        }


        if (document.getElementById('lineCheck').checked) {
          document.getElementById('ifLine').style.visibility = 'visible';
        }
        else{
          document.getElementById('ifLine').style.visibility = 'hidden';
        }

    

      }
     


  </script>

	
<style>

	$font-family:   "Roboto";
    $font-size:     14px;

	$color-primary: #ABA194;

	* {
	    margin: 0;
	    padding: 0;
	    box-sizing: border-box;
	}

	body {
	    font-family: $font-family;
	    font-size: $font-size;
	    background-color: #006699;
	}

	.user {
	    width: 90%;
	    max-width: 340px;
	    margin: 10vh auto;
	}

	.user__header {
	    text-align: center;
	    opacity: 0;
	    transform: translate3d(0, 500px, 0);
	    animation: arrive 500ms ease-in-out 0.7s forwards;
	}

	.user__title {
	    font-size: $font-size;
	    margin-bottom: -10px;
	    font-weight: 500;
	    color: white;
	}

	.form {
	    margin-top: 40px;
	    border-radius: 6px;
	    overflow: hidden;
	    opacity: 0;
	    transform: translate3d(0, 500px, 0);
	    animation: arrive 500ms ease-in-out 0.9s forwards;
	}

	[type=text] {
	  display: block;
	  margin: 0 auto;
	  width: 97%;
	  border: 0;
	  border-bottom: 1px solid rgb(255, 255, 255);
	  height: 45px;
	  line-height: 45px;  
	  margin-bottom: 20px;
	  font-size: 1em;
	  background-color: #006699;
	  color: white;
	}

	[type=password] {
	  display: block;
	  margin: 0 auto;
	  width: 97%;
	  border: 0;
	  border-bottom: 1px solid rgb(255, 255, 255);
	  height: 45px;
	  line-height: 45px;  
	  margin-bottom: 10px;
	  font-size: 1em;
	  background-color: #006699;
	  color: white;
	}

	[type='text']:focus {
	  outline: none;
	  border-color: #53CACE;
	}

	[type='password']:focus {
	  outline: none;
	  border-color: #53CACE;
	}

	::placeholder { 
	  color: white;
	  opacity: 1; 
	}

	:-ms-input-placeholder {
	  color: white;
	}


	select {
	  display: block;
	  margin: 0 auto;
	  width: 97%;
	  border: 0;
	  border-bottom: 1px solid rgba(0,0,0,.2);
	  height: 45px;
	  line-height: 15px;  
	  margin-bottom: 10px;
	  font-size: 1em;
	  color: rgba(0,0,0,.4);

	}

	

	label {
		color: white;
		font-size: 1.3em;
	}

	[type=submit] {
	  margin-top: 25px;
	  width: 100%;
	}

	@keyframes NO {
	  from, to {
	    -webkit-transform: translate3d(0, 0, 0);
	    transform: translate3d(0, 0, 0);
	  }

	  10%, 30%, 50%, 70%, 90% {
	    -webkit-transform: translate3d(-10px, 0, 0);
	    transform: translate3d(-10px, 0, 0);
	  }

	  20%, 40%, 60%, 80% {
	    -webkit-transform: translate3d(10px, 0, 0);
	    transform: translate3d(10px, 0, 0);
	  }
	}

	@keyframes arrive {
	    0% {
	        opacity: 0;
	        transform: translate3d(0, 50px, 0);
	    }
	    
	    100% {
	        opacity: 1;
	        transform: translate3d(0, 0, 0);
	    }
	}

	@keyframes move {
	    0% {
	        background-position: 0 0
	    }

	    50% {
	        background-position: 100% 0
	    }

	    100% {
	        background-position: 0 0
	    }
	}

	.login__link {
	  font-size: .8rem;
	  font-weight: 600;
	  text-decoration: underline;
	  color: #ffffff;
	  &:focus,
	  &:hover {color: darken(#999, 13%);}
	}

  .termsbox{

    display: none;
    position : fixed;
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    height: 80%;
    width: 100%;
    overflow: auto;  
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

  }

  .termsbox-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  .close {
  color: #006699;
  float: right;
  font-size: 28px;
  font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }




</style>

</head>
<body>

  <div class="user">
    <header class="user__header">
        <img src="businessLogo.png" width="200" height="200" />
        <h1 class="user__title">Connect with Businesses WorldWide!</h1>
    </header>
    
    <form class="form" method="post" action="sales_marketing_signups.php?reg_salesMarketing_user=1" enctype="multipart/form-data">

      <?php include('errors.php'); ?>

       <input type="text" name="firstName" placeholder='First Name:*' required/>

       <input type="text" name="lastName" placeholder='Last Name:*' required/>

       <input type="text" name="firmName" placeholder='Firm Name:*' required/>


      
       <input type="text" name="email" placeholder='Email:*' required/>
  
       <input type="password" name="password_1" placeholder='Password:*' required/>
    
       <input type="password" name="password_2" placeholder='Confirm Password:*' required/>

       <!-- Code for TextArea Editor -->
        <label for="businessDecription"> Business Description:* </label>
        
        <textarea name="businessDescript" style="height: 110px; font-size: 0.8em; width: 290px;" placeholder="Business Description:* " required> </textarea>
        <br>


       <!-- Code for uploading copy of Work documents -->
       <h3 style="margin-top: 10px; color: white; font-size: 1em;"> Upload Copy of Work(PDF)*: <input name="copyWork" id="copyWork" type="file" accept=".pdf,.doc" required> </h3><br><br>
      
 
       <!-- Code for uploading additional Info -->
       <h3 style="margin-top: -35px; color: white; font-size: 1em;"> Additional Information (PDF): <input name="additionalInfo" id="additionalInfo" type="file" accept=".pdf,.doc" required> </h3><br>
       
       
 

         <!-- Code for selecting languages -->

        <label> Select Language/s:</label><br>

        <label for="one"> <input type="checkbox" name="language[]" value="english"/> English </label>
        <label for="two"> <input type="checkbox" name="language[]" value="french"/> French </label>
        <label for="three"> <input type="checkbox" name="language[]" value="spanish"/> Spanish </label>

        <label for="four"> <input type="checkbox" name="language[]" value="chinese"/> Mandarin Chinese </label>
        <label for="five"> <input type="checkbox" name="language[]" value="japanese"/> Japanese </label>

        <label for="six"> <input type="checkbox" name="language[]" value="hindustani"/> Hindustani </label>
        <label for="seven"> <input type="checkbox" name="language[]" value="arabic"/> Arabic </label>
        <label for="eight"> <input type="checkbox" name="language[]" value="malay"/> Malay </label>
        <label for="nine"> <input type="checkbox" name="language[]" value="russian"/> Russian </label>
        <label for="ten"> <input type="checkbox" name="language[]" value="bengali"/> Bengali </label>
        <label for="eleven"> <input type="checkbox" name="language[]" value="portuguese"/> Portuguese </label>
        <label for="twelve"> <input type="checkbox" name="language[]" value="german"/> German </label>
        <label for="thirteen"> <input type="checkbox" name="language[]" value="italian"/> Italian </label>

        <label for="fourteen"> <input type="checkbox" name="language[]" value="turkish"/> Turkish </label>
        <label for="fifteen"> <input type="checkbox" name="language[]" value="dutch"/> Dutch </label><br><br>


        <input type='text' name="otherLanguage" placeholder='Other Languages(If Any):'  /><br>
       

        
        <!-- Address section of code -->
       <label for="permanentAddress" style="margin-top: 20px;"> Permanent Address: </label>
       
       <input type='text' name="street" placeholder='Street Addresss:' />
       
       <!-- Getting script from file to load countries code -->
       <script type= "text/javascript" src = "countries.js"></script>

       <select id="country" name ="country" required>
         <optgroup>
          <option value='' disabled selected>Country*....</option>
         </optgroup>
       </select> 
       
       <select name ="state" id ="state" required>
         <optgroup>
          <option value='' disabled selected>State*....</option>
         </optgroup>
       </select> 
       <!-- Script for loading countries from file into select fields. Should be left here -->
       <script language="javascript">
          populateCountries("country", "state"); 
      </script>
      <br>


  

        <!-- Contact section of code -->
       <label for="contactinfo" style="margin-top: 20px;"> Contact Information: </label>

       <input type='text' name="phoneNumber" maxlength="15" placeholder='Phone Number*:'  required/>
       <input type='text' name="linkedIn" placeholder='LinkedIn URL:'  />

       <p style="color: white;">Skype<input type="checkbox" style="margin-right: 30px;" onclick="javascript:contactinfoCheck();" name="skype" id="skypeCheck"> </p>
       <p style="color: white;">Whatsapp<input type="checkbox" style="margin-right: 30px;" onclick="javascript:contactinfoCheck();" name="whatsapp" id="whatsappCheck"></p>
       <p style="color: white;">IMO <input type="checkbox" style="margin-right: 30px;" onclick="javascript:contactinfoCheck();" name="imo" id="imoCheck"></p>
       <p style="color: white;">Line <input type="checkbox" onclick="javascript:contactinfoCheck();" name="line" id="lineCheck"></p><br>

       <div id="ifskype" style="display:none">
        <input type='text' id='skypefield' name='skype' placeholder="Enter Skype Information"><br>
       </div>

       <div id="ifwhatsapp" style="display:none">
        <input type='text' id='whatsappfield' name='whatsapp' placeholder="Enter Whatsapp Number with + In front"><br>
       </div>

       <div id="ifImo" style="display:none">
        <input type='text' id='imofield' name='imo' placeholder="Enter IMO Information"><br>
       </div>

       <div id="ifLine" style="visibility:hidden">
        <input type='text' id='linefield' name='line' placeholder="Enter Line Information"><br>
       </div> 

       <!-- Code for Terms and Service -->
          
        <label for="terms" style="font-size: 0.9em; color: white;"> <input name="terms[]" type="checkbox" value="I agree to Terms and Conditions"/> I have read and agreed to the <a href="#" style="color: white;" id="termsCondition">Terms and Conditions</a> </label><br><br><br>
        
      
        <select name="plan" required>
        	<optgroup label="Plan" name="plan">
        		<option selected hidden value="">Select your Plan</option>
            	<option value="30.00/Month After a 14 Day Trial!">$30.00/Month After a 14 Day Trial!</option>       		
        	</optgroup>
        	
        </select>
        
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_CglILUEaaTq21KcB24Jl1xJk"
            data-amount="3000"
            data-name="Business Studs"
            data-description="Sales and Marketing Firm Plan"
            data-image="businessLogo.png"
            data-locale="auto"
            data-currency="cad"
            data-zip-code="true"
            data-label="Start 14 Day Trial"
            data-panel-label="Subscribe">
        </script>

        <br><br>
        <a class="login__link" href="logins_firm_page.php">I have already registered. Take me to Log in!</a>

        
        
    </form>
</div>

    <!-- The Terms and Conditions Box -->
        <div id="myterms" class="termsbox">

          <!-- Terms and Conditions content -->
          <div class="termsbox-content">
            <span class="close">&times;</span>
                <h2>Business Studs Inc. Privacy Policy</h2>
                <p>This Privacy Policy describes how your personal information is collected, used, and shared when
                you visit or make a purchase from www.businessstuds.com.</p>

                <p>Our central goal is to interface the world's experts to enable them to be increasingly beneficial and
                fruitful. Our platform is intended to advance financial open door for our individuals by
                empowering you and a large number of different experts to meet, trade thoughts, learn, and
                discover openings or representatives, work, and settle on choices in a system of confide.</p>
                <h2>CONTRACT</h2>
                <p>You concur that by clicking "Get access now", "Join Business Studs", "Sign Up" or enrolling,
                getting to or utilizing our services, you are consenting to go into a legitimately restricting contract
                with Business Studs Inc. (regardless of whether you are utilizing our Services in the interest of an
                organization). In the event that you don't consent to this agreement ("Contract" or "Client
                Agreement"), don't click "Sign Up" (or comparable) and don't get to or generally utilize any of our
                Services. If you wish to end this agreement, whenever, you can do as such by deleting your account
                and never again getting to or utilizing our Services.</p>
                <p>This Contract applies to businessstuds.com, Businessstuds-marked application, that express that
                they are offered under this Contract ("Services"), including the offsite accumulation of information
                for those Services, for example, our advertisements and the "Apply with Business Studs" and
                "Offer with Business studs" modules. Enlisted clients of our Services are "Individuals" and
                unregistered clients are "Guests". This Contract applies to the both Members and Visitors.</p>
                <h2>YOU’RE ACCOUNT</h2>
                <p>Individuals are account holders. You consent to: (1) attempt to pick a solid and secure password;
                (2) keep your password secure and private; (3) not exchange any piece of your account and (4)
                pursue the law and our rundown of Dos and Don'ts and Professional Community Policies. You are
                in charge of whatever occurs through your account except if you close it or report abuse.</p>
                <p>As among you and others (counting your boss), your account has a place with you. In any case, if
                the Services were bought by another body for you to utilize (for example purchased by your boss),
                the person paying for such Service has the directly to control access to and get the details regarding
                your utilization of such paid Service; be that as it may, they don't have rights to your account.</p>
                <h2>PERSONAL INFORMATION WE COLLECT</h2>
                <p>When you visit the Site, we can automatically collect certain information about your device,
                including information about your web browser, IP address, time zone, and some of the cookies
                that are installed on your device. Additionally, as you browse the Site, we can collect information
                about the individual web pages or products that you view, what websites or search terms referred
                you to the Site, and information about how you interact with the Site. We refer to this
                automatically-collected information as “Device Information.”</p>
                <p>We collect Device Information using the following technologies:</p>
                <p>- “Cookies” are data files that are placed on your device or computer and often include an
                anonymous unique identifier. For more information about cookies, and how to disable cookies,
                visit http://www.allaboutcookies.org.</p>
                <p>- “Log files” track actions occurring on the Site, and collect data including your IP address,
                browser type, Internet service provider, referring/exit pages, and date/time stamps.</p>
                <p>- “Web beacons,” “tags,” and “pixels” are electronic files used to record information about how
                you browse the Site.</p>
                <p>Additionally when you make a purchase or attempt to make a purchase through the Site, we
                provide the service through https://stripe.com linked to our platform, while payments between
                clients are though https://www.escrow.com. We refer to this information as “Order Information”
                and we do not store it in our systems.</p>
                <p>When we talk about “Personal Information” in this Privacy Policy, we are talking both about
                Device Information and Order Information.</p>
                <h2>PAYMENT</h2>
                <p>In the event that you purchase any of our paid Services, you consent to pay us the relevant expenses
                and imposes and to extra terms explicit to the paid Services. Inability to pay these charges will
                result in the end of your paid Services. Likewise, you concur that:</p>
                <p>Your buy might be liable to foreign exchange charges or contrasts in costs dependent on area (for
                example exchange rates). We (stripe.com & escrow.com) may store and keep charging your
                installment strategy (for example credit card) even after it has terminated, to keep away from
                intrusions in your Services and to use to pay different Services you may purchase.</p>
                <p>In the event that you buy a membership, your installment naturally will be charged toward the
                beginning of every membership period for the expenses and duties pertinent to that period. To stay
                away from future charges, drop before the recharging date. Figure out how to drop or suspend your
                membership services.</p>
                <p>We may ascertain charges payable by you dependent on the charging data that you give us at the
                season of purchase. You can get a copy of your receipt through your BusinessStuds account
                settings under "Buy History".</p>
                <h2>HOW DO WE USE YOUR PERSONAL INFORMATION?</h2>
                <p>When in line with the preferences you have shared with us, provide you with information or
                advertising relating to our products or services.</p>
                <p>We can use the Device Information that we collect to help us screen for potential risk and fraud
                (in particular, your IP address), and more generally to improve and optimize our Site (for example,
                by generating analytics about how our customers browse and interact with the Site, and to assess
                the success of our marketing and advertising campaigns).</p>
                <h2>SHARING YOUR PERSONAL INFORMATION</h2>
                <p>We can also use Google Analytics to help us understand how our customers use the Site--you can
                read more about how Google uses your Personal Information here:
                https://www.google.com/intl/en/policies/privacy/. You can also opt-out of Google Analytics here:
                https://tools.google.com/dlpage/gaoptout. Finally, we may also share your Personal Information
                to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other
                lawful request for information we receive, or to otherwise protect our rights.</p>
                <h2>BEHAVIOURAL ADVERTISING</h2>
                <p>As described above, we can use your Personal Information to provide you with targeted
                advertisements or marketing communications we believe may be of interest to you. For more
                information about how targeted advertising works, you can visit the Network Advertising
                Initiative’s (“NAI”) educational page at http://www.networkadvertising.org/understandingonline-
                advertising/how-does-it-work.</p>
                <p>You can opt out of targeted advertising by:
                [[ INCLUDE OPT-OUT LINKS FROM WHICHEVER SERVICES BEING USED.
                COMMON LINKS INCLUDE:
                FACEBOOK - https://www.facebook.com/settings/?tab=ads
                GOOGLE - https://www.google.com/settings/ads/anonymous
                BING - https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads ]]
                Additionally, you can opt out of some of these services by visiting the Digital Advertising
                Alliance’s opt-out portal at: http://optout.aboutads.info/.</p>
                <h2>DO NOT TRACK</h2>
                <p>Please note that we do not alter our Site’s data collection and use practices when we see a Do Not
                Track signal from your browser.</p>
                <h2>YOUR RIGHTS</h2>
                <p>If you are a European resident, you have the right to access personal information we hold about
                you and to ask that your personal information be corrected, updated, or deleted. If you would like
                to exercise this right, please contact us through the contact information below. Additionally, if you
                are a European resident we note that we are processing your information in order to fulfill contracts
                we might have with you (for example if you make an order through the Site), or otherwise to
                pursue our legitimate business interests listed above. Additionally, please note that your
                information will be transferred outside of Europe, including to Canada and the United States.</p>
                <h2>LIMITS</h2>
                <p>Business Studs maintains all authority to constrain your utilization of the Services, including the
                quantity of your associations and your capacity to contact different Members. Business Studs
                claims all authority to limit, suspend, or end your account if Business Studs notices that you might
                be in break of this Contract or law or are abusing the Services (e.g., disregarding any of the Dos
                and Don'ts or Professional Community Policies).</p>
                <h2>INTELLECTUAL PROPERTY RIGHTS</h2>
                <p>Business Studs saves the majority of its licensed innovation rights in the Services. Utilizing the
                Services does not give you any possession in our Services or the substance or data made accessible
                through our Services. Trademarks and logos utilized regarding the Services are the trademarks of
                their individual proprietors. Businessstuds.com, Business Studs App, and "in" logos and different
                Business Studs trademarks, service imprints, illustrations, and logos utilized for our Services are
                trademarks or enlisted trademarks of Business Studs Inc.</p>
                <h2>DISCLAIMER AND LIMIT OF LIABILITY</h2>
                <h2>   I- NO WARRANTY</h2>
                <p>TO THE EXTENT ALLOWED UNDER LAW, BUSINESS STUDS AND ITS AFFILIATES
                (AND THOSE THAT BUSINESS STUDS WORKS WITH TO PROVIDE THE SERVICES) (A)
                DISCLAIM ALL IMPLIED WARRANTIES AND REPRESENTATIONS (E.G. GAURANTEES
                OF MERCHANT-ABILITY, FITNESS FOR A PARTICULAR PURPOSE, ACCURACY OF
                DATA, AND NON-INFRINGEMENT); (B) DO NOT GUARANTEE THAT THE SERVICES
                WILL FUNCTION WITHOUT INTERRUPTION OR ERRORS, AND (C) PROVIDE THE
                SERVICE (INCLUDING CONTENT AND INFORMATION) ON AN "AS SEEMS TO BE"
                AND "AS AVAILABLE" BASIS. A FEW LAWS DO NOT ALLOW CERTAIN
                DISCLAIMERS, SO SOME OR ALL OF THESE DISCLAIMERS MAY NOT APPLY TO YOU.</p>
                <h2>II- EXCLUSION OF LIABILITY</h2>
                <p>TO THE EXTENT PERMITTED UNDER LAW (AND UNLESS BUSINESS STUDS HAS
                ENTERED INTO A SEPARATE WRITTEN AGREEMENT THAT OVERRIDES THIS
                CONTRACT), BUSINESS STUDS AND ITS AFFILIATES (AND THOSE THAT BUSINESS
                STUDS WORKS WITH TO PROVIDE THE SERVICES) SHALL NOT BE LIABLE TO YOU
                OR OTHERS FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL OR
                PUNITIVE DAMAGES, OR ANY LOSS OF DATA, OPPORTUNITIES, REPUTATION,
                PROFITS OR REVENUES, RELATED TO THE SERVICES (E.G. HOSTILE OR
                DEFAMATORY STATEMENTS, DOWN TIME OR LOSS, USE OF, OR CHANGES TO,
                YOUR INFORMATION OR CONTENT).</p>
                <h2>DATA RETENTION</h2>
                <p>When you place an order through the Site, we will maintain your Order Information for our
                records unless and until you ask us to delete this information.</p>
                <h2>MINORS</h2>
                <p>The Site is not intended for individuals under the age of 18. You should not create an account
                using any false information or on behalf of others, including persons under the age of 18.</p>
                <h2>CHANGES</h2>
                <p>We may update this privacy policy from time to time in order to reflect, for example, changes to
                our practices or for other operational, legal or regulatory reasons. We may change this Contract,
                our Privacy Policy and our Cookies Policies every once in a while. In the event that we roll out
                material improvements to it, we will give you see through our Services, or by different methods,
                to give you the chance to audit the progressions previously they end up compelling. We concur
                that changes can't be retroactive. If you object any item to any changes, you may close your
                account. Your proceed with utilization of our Services after we distribute or send a notice about
                our progressions to these terms implies that you are consenting to the refreshed terms.</p>
                <h2> TERMINATION</h2>
                <p>Both you and BUSINESS STUDS may end this Contract whenever with notice to the next. On
                end, you lose the directly to access or utilize the Services. The accompanying will endure end: Our
                rights to utilize and reveal your feedback; individuals or potentially Visitors' rights to encourage
                re-share substance and data you shared through the Service to the degree replicated or re-shared
                before end. Any sums owed by either party preceding termination remain owed after end.</p>
                <h2>BUSINESS STUDS DOS & DON’TS</h2>
                <p><b>You accede to that you will:</b>
                <p>Consent to every single appropriate law, including, without impediment, security laws, licensed
                innovation laws, hostile to spam laws, trade control laws, tax laws, and regulatory necessities;</p>
                <p>Give exact data to us and keep it refreshed;</p>
                <p>Utilize your genuine name on your profile; and</p>
                <p>Utilize the Services in a professional way.</p>
                <p><b>You accede to that you will <i>not</i>:</b>
                <p>Make a bogus character on Business Studs, distort your personality, make a Member profile for
                anybody other than yourself (a genuine individual), or use or endeavor to utilize another's account;</p>
                <p>Create, backing or use programming, gadgets, contents, robots, or some other methods or
                procedures (counting crawlers, program modules and additional items, or some other innovation)
                to rub the Services or generally duplicate profiles and other information from the Services;</p>
                <p>Abrogate any security highlight or sidestep or evade any entrance controls or use cutoff points of
                the Service, (for example, tops on catchphrase ventures or profile sees);</p>
                <p>Duplicate, use, reveal or disseminate any data acquired from the Services, regardless of whether
                specifically or through outsiders, (for example, web search tools), without the assent of Business
                Studs;</p>
                <p>Unveil data that you don't have the agree to uncover, (for example, secret data of others (counting
                your boss));</p>
                <p>Disregard the licensed innovation privileges of others, including copyrights, licenses, trademarks,
                exchange insider facts, or other restrictive rights. For instance, don't duplicate or disseminate (aside
                from through the accessible sharing usefulness) the posts or other substance of others without their
                authorization, which they may give by posting under a Creative Commons permit;</p>
                <p>Damage the protected innovation or different privileges of Business Studs, including, without
                constraint, (I) duplicating or appropriating our learning recordings or different materials or (ii)
                replicating or dispersing our innovation, except if it is discharged under open source licenses; (iii)
                utilizing "Business Studs" or our logos in any business name, email, or URL aside from as gave in
                the Brand Guidelines;</p>
                <p>Post whatever contains software viruses, worms, or some other destructive code;</p>
                <p>Figure out, decompile, dismantle, translate or generally endeavor to determine the source code for
                the Services or any related innovation that isn't open source;</p>
                <p>Infer or express that you are subsidiary with or supported by Business Studs without our express
                assent (e.g., speaking to yourself as a certify Business Studs mentor);</p>
                <p>Lease, rent, advance, exchange, move/re-move or generally adapt the Services or related
                information or access to the equivalent, without Business Studs’ assent;</p>
                <p>Profound connect to our Services for any reason other than to advance your profile or a Group on
                our Services, without Business Studs’ assent;</p>
                <p>Use bots or other mechanized strategies to get to the Services, include or download contacts, send
                or divert messages;</p>
                <p>Screen the Services' accessibility, execution or usefulness for any aggressive reason;</p>
                <p>Take part in "surrounding," "reflecting," or generally reenacting the appearance or capacity of the
                Services;</p>
                <p>Overlay or generally adjust the Services or their appearance, (for example, by embedding
                components into the Services or evacuating, covering, or darkening a promotion included on the
                Services);</p>
                <p>Meddle with the task of, or place an absurd burden on, the Services (e.g., spam, forswearing of
                service assault, viruses, gaming calculations); as well as</p>
                <p>Damage the Professional Community Policies or any extra terms concerning a particular Service
                that are given when you join to or begin utilizing such Service.</p>
                <h2>TERMS IN GENERAL</h2>
                <p>In the event that a court with power over this Contract finds any piece of it unenforceable, you and
                we concur that the court ought to adjust the terms to make that part enforceable while as yet
                accomplishing its goal. In the event that the court can't do that, you and we consent to request that
                the court evacuate that unenforceable part and still uphold whatever is left of this Contract.</p>
                <p>To the degree permitted by law, the English language form of this Contract is official and different
                interpretations are for accommodation as it were. This Contract (counting extra terms that might
                be furnished by us when you draw in with a component of the Services) is the main understanding
                between us in regards to the Services and supplants every earlier assertion for the Services.</p>
                <p>In the event that we don't act to authorize a break of this Contract, does not imply that Business
                Studs has postponed its entitlement to uphold this Contract. You may not allot or exchange this
                Contract (or your enrollment or utilization of Services) to anybody without our assent. In any case,
                you concur that Business Studs may dole out this Contract to its offshoots or a party that purchases
                it without your assent. There are no outsider recipients to this Contract.</p>
                <h2>CONTACT US</h2>
                <p>For more information about our privacy practices, if you have questions, or if you would like to
                make a complaint, please contact us by e-mail at info@businessstuds.com &
                report@businessstuds.com.</p>
          </div>

        </div>

        <!-- Code to display terms and conditions box -->
        <script>

          // Get the terms
          var box = document.getElementById('myterms');

          // Get the link that opens the box
          var link = document.getElementById("termsCondition");

          // Get the <span> element that closes the box
          var span = document.getElementsByClassName("close")[0];

          // When the user clicks the button, open the modal 
          link.onclick = function() {
            box.style.display = "block";
          }

          // When the user clicks on <span> (x), close the box
          span.onclick = function() {
            box.style.display = "none";
          }

          // When the user clicks anywhere outside of the box, close it
          window.onclick = function(event) {
            if (event.target == box) {
              box.style.display = "none";
            }
          }
          

        </script>   

</body>
</html>