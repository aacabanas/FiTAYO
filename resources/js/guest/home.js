import { uid } from "chart.js/helpers";
import Utility from "../utils/utility";
import Swal from "sweetalert2";

window.utils = new Utility(Utility.CTX_guest)
var cities = (reg_code) =>{

}
utils.$("#login").on("click", () => {
    utils.show({
        title:"Login",
        html: `
        <form action="${utils.$("#login_route").text()}" method="post" class="login-form">
            <input type="hidden" value="${utils.$("#login_csrf").text()}" autocomplete>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="username" id="username" class="form-control" placeholder="">
                            <label for="username">Enter your Username</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" name="password" id="password" class="form-control" placeholder="">
                            <label for="password">Enter your Password</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
                <br>
                <div class="forgot-password text-center">
                    <a href="#">Forgot Password?</a>
                </div>
        `
    })
})
utils.$("#register").on("click", () => {
    Swal.showLoading()
    setTimeout(()=>{Swal.hideLoading()},5000)
    utils.show({
        title:"Data Privacy Notice",
        html: `
            <div class="container mt-5">
                <div class="policies-content mb-4">
                    <h6 class="text-uppercase text-secondary">Introduction</h6>
                    <p>
                        At Stamina Fitness Centre, we value your privacy and are committed to protecting your personal data
                        in compliance with the Data Privacy Act of 2012 (Republic Act No. 10173) of the Philippines. This
                        Data Privacy Notice explains how we collect, use, and safeguard your personal information.
                    </p>
                    <h6 class="text-uppercase text-secondary mt-4">Collection of Personal Data</h6>
                    <p>
                        We collect personal data that you provide to us directly through various means, including:
                    </p>
                    <ul>
                        <li>Membership registration forms, both online and offline</li>
                        <li>Health assessment forms</li>
                        <li>Event and activity registration forms</li>
                        <li>Communications through emails, phone calls, and face-to-face interactions</li>
                        <li>Payment transactions</li>
                    </ul>
                    <p>
                        The personal data we collect includes, but is not limited to:
                    </p>
                    <ul>
                        <li>Full name</li>
                        <li>Contact information (email address, phone number, home address)</li>
                        <li>Demographic information (age, gender, date of birth)</li>
                        <li>Health and medical information relevant to your fitness activities</li>
                        <li>Payment details (credit/debit card information, billing address)</li>
                    </ul>
                    <h6 class="text-uppercase text-secondary mt-4">Use of Personal Data</h6>
                    <p>
                        Your personal data is used for the following purposes:
                    </p>
                    <ul>
                        <li>To manage your gym membership and provide you with access to our facilities and services</li>
                        <li>To conduct health assessments and tailor fitness programs to your needs</li>
                        <li>To communicate with you regarding your membership, schedules, and any updates</li>
                        <li>To process your payments and manage your financial transactions</li>
                        <li>To improve our services through internal analysis and research</li>
                        <li>To ensure your safety and provide first aid or emergency response if necessary</li>
                    </ul>
                    <h6 class="text-uppercase text-secondary mt-4">Data Security</h6>
                    <p>
                        We implement appropriate technical and organizational measures to protect your personal data from
                        unauthorized access, use, or disclosure. These measures include:
                    </p>
                    <ul>
                        <li>Secure storage of physical and digital records</li>
                        <li>Restricted access to your data, limited to authorized personnel only</li>
                        <li>Use of encryption technologies for sensitive information</li>
                        <li>Regular security audits and assessments</li>
                        <li>Training our staff on data privacy and protection practices</li>
                    </ul>
                    <h6 class="text-uppercase text-secondary mt-4">Sharing of Personal Data</h6>
                    <p>
                        We do not share your personal data with third parties without your consent, except in the following
                        circumstances:
                    </p>
                    <ul>
                        <li>When required by law or legal processes</li>
                        <li>When necessary to provide our services (e.g., sharing information with fitness instructors for
                            personalized training)</li>
                        <li>When required to protect your vital interests (e.g., sharing medical information with healthcare
                            providers in emergencies)</li>
                    </ul>
                    <h6 class="text-uppercase text-secondary mt-4">Retention of Personal Data</h6>
                    <p>
                        We retain your personal data only for as long as necessary to fulfill the purposes for which it was
                        collected and to comply with legal obligations. The retention period may vary depending on the type
                        of data and the purpose for its collection.
                    </p>
                    <h6 class="text-uppercase text-secondary mt-4">Your Rights</h6>
                    <p>
                        Under the Data Privacy Act of 2012, you have the following rights regarding your personal data:
                    </p>
                    <ul>
                        <li><strong>Right to Access:</strong> You can request access to your personal data held by us.</li>
                        <li><strong>Right to Rectification:</strong> You can request corrections to any inaccuracies in your
                            personal data.</li>
                        <li><strong>Right to Erasure:</strong> You can request the deletion of your personal data under
                            certain conditions.</li>
                        <li><strong>Right to Restrict Processing:</strong> You can request the restriction of processing
                            your personal data under certain conditions.</li>
                        <li><strong>Right to Object:</strong> You can object to the processing of your personal data under
                            certain conditions.</li>
                        <li><strong>Right to Data Portability:</strong> You can request the transfer of your personal data
                            to another organization.</li>
                    </ul>
                    <p>
                        To exercise these rights, please contact us at our provided contact information. We will respond to
                        your request within a reasonable timeframe.
                    </p>
                    <h6 class="text-uppercase text-secondary mt-4">Changes to the Privacy Notice</h6>
                    <p>
                        We may update this Data Privacy Notice from time to time to reflect changes in our practices or for
                        other operational, legal, or regulatory reasons. Any changes will be posted on our website and,
                        where appropriate, notified to you via email.
                    </p>
                    <p class="mt-4">
                        If you have any questions or concerns about our Data Privacy Notice, please do not hesitate to
                        contact us at 09234567891 or visit our customer service desk.
                    </p>
                </div>`,
        customClass: "swal-lg",
        confirmButtonText: "Accept"
    }).then((d) => {
        if (d.isConfirmed) {
            var true_code = ""
            utils.loader()
            utils.$.getJSON("/trainers",(data)=>{
                var htmlcode = ""
                utils.$.each(data,(i,v)=>{
                    htmlcode +=`<option value="${v.name}"> ${v.name} | Time in:
                                        ${ v.time_in } | Time out: ${ v.time_out } | Trainees :
                                        ${ v.trainee_count }/10</option>`
                })
                utils.show({title:"Registration form",
                    customClass: "swal-lg",html:`<form action="${utils.$("#reg_route").text()}" method="post">
                    <input type="hidden" value="${utils.$("#register_csrf").text()}" autocomplete>
                   
                    <br>
                    <div class="row text-center border border-primary">
                        <h5>Credentials</h5>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" name="email" id="email" class="form-control" placeholder="">
                                <label for="email">Enter your Email</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="username" id="username" class="form-control" placeholder="">
                                <label for="username">Enter your Username</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" name="password" id="password" class="form-control" placeholder="">
                                <label for="password">Enter your Password</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" name="password_confirmation" id="confirm-password" class="form-control"
                                    placeholder="">
                                <label for="confirm-password">Confirm your Password</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row text-center border border-primary">
                        <h5>Profile</h5>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="">
                                <label for="firstname">Enter your First Name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="">
                                <label for="lastname">Enter your Last Name</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="">
                                <label for="birthdate">Enter your Birthdate</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="tel" name="contactnum" id="contactnum" class="form-control" placeholder=""
                                    minlength="10" maxlength="11">
                                <label for="contactnum">Enter your contact number</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
    
                            <div class="form-floating">
                                <select name="region" id="region" class="form-control" required="required" placeholder>
                                    <option region_code="None">Choose a Region</option>
                                </select>
                                <label for="region">Region</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select name="city" id="city" class="form-control" required="required" placeholder>
                                    <option city_code="None">Choose a City</option>
                                </select>
                                <label for="city">City:&nbsp;</label>
                            </div>
    
    
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <select name="barangay" id="barangay" class="form-control" required="required" placeholder>
                                    <option>Choose a Barangay</option>
                                </select>
                                <label for="barangay">Barangay</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" name="streetnum" id="streetnum" class="form-control"
                                    required="required" placeholder>
                                <label for="streetnum">Street No./Street</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row text-center border border-primary">
                        <h5>Health Assessment Form</h5>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="number" step="0.1" name="height" id="height" class="form-control"
                                    required="required" placeholder="" min="0">
                                <label for="height">Height(in)</label>
    
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="number" step="0.1" name="weight" id="weight" class="form-control"
                                    required="required" placeholder min="0">
                                <label for="weight">Weight(lbs)</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="bmi" name="bmi"
                                    readonly="readonly" step="0.01" placeholder>
                                <label for="bmi">BMI</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="bmitype" name="bmitype"
                                    readonly="readonly">
                                <label for="bmitype">BMI Classification</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-center">
                                    Are you physically fit?
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-6">
                                    <input type="radio" name="physfit" id="physfit" class="form-radio" value="1">
                                    <label for="physfit">Yes</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="physfit" id="physfit" class="form-radio" value="0">
                                    <label for="physfit">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-center">
                                    Have you undergone an operation?
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-6">
                                    <input type="radio" name="operation" id="operation" class="form-radio"
                                        value="1">
                                    <label for="operation">Yes</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="operation" id="operation" class="form-radio"
                                        value="0">
                                    <label for="operation">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-center">
                                    Do you have high blood pressure?
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-6">
                                    <input type="radio" name="bp" id="bp" class="form-radio" value="1">
                                    <label for="bp">Yes</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="bp" id="bp" class="form-radio" value="0">
                                    <label for="bp">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-center">
                                    Do you have heart problem?
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-6">
                                    <input type="radio" name="hp" id="hp" class="form-radio" value="1">
                                    <label for="hp">Yes</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="hp" id="hp" class="form-radio" value="0">
                                    <label for="hp">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" name="emergencyname" id="emergencyname" class="form-control"
                                    placeholder>
                                <label for="emergencyname">Emergency Contact Name:</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" name="emergencycontact" id="emergencycontact" class="form-control"
                                    placeholder>
                                <label for="emergencycontact">Emergency Contact Number:</label>
    
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating">
                                <select name="trainer" id="trainer" class="form-control" placeholder="">
                                    <option selected>Available Trainers</option>
                                    ${htmlcode}
                                </select>
                                <label for="trainer">Trainer</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
    
                </form>
                
                `,customClass: "swal-lg",
                didRender:()=>
                    {
                        var utils = new Utility(Utility.CTX_guest)
                        utils.$.each(utils.regions,(i,v)=>{
                            utils.$("#region").html(utils.$("#region").html() + `<option region_code="${v.code}" value="${v.name}">${v.name}</option>`)
                        })
                        utils.$("#region").on("change",(e)=>{
                            
                            var reg_code = utils.$("#region option:selected").attr("region_code")
                            console.log(utils.cities(reg_code))
                            if (reg_code == "None") {
                                utils.$("#city").empty().html('<option city_code="None" selected>Choose a City</option>')
                                utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
                                return
                            }
                            utils.$("#city").empty().html('<option city_code="None" selected>Choose a City</option>')
                            utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
                            utils.$.each(utils.cities(reg_code),(k,v)=>{
                                utils.$("#city").append(`<option city_code="${v['code']}" value="${v['name']}">${v['name']}</option>`)
                            })
                           
                            
                        })
                        utils.$("#city").on("change",(e)=>{
                            var reg_code = utils.$("#region option:selected").attr("region_code")
                            var city_code = utils.$("#city option:selected").attr("city_code")
                            if (city_code == "None" || reg_code == "None") {
                                utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
                                return
                            }
                            utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
                            utils.$.each(utils.barangays(reg_code,city_code),(i,v)=>{
                                utils.$("#barangay").append(`<option value="${v.name}">${v.name}</option>`)
                            })
                            
                        })
                        utils.$("#weight,#height").on('change', function (e) {
                            if (utils.$("#height").val() == "" && utils.$("#weight").val() == "") return
                            var user_bmi = Math.round((utils.$("#weight").val() / Math.pow(utils.$("#height").val(), 2)) * 703)
                            utils.$("#bmi").val(user_bmi)
                            utils.$("#bmitype").val(
                                user_bmi < 18.5 ? "Underweight" : user_bmi <= 24.9 ? "Normal" : user_bmi <= 29.9 ?
                                    "Overweight" : "Obese"
                            )
                        })
                    }
                    
                })
            })
            
            
        }
    })
})

