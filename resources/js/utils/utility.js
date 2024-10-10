import { Html5QrcodeScanner } from "html5-qrcode"
import { get } from "../properties/properties"
import { each,getJSON } from "jquery"
import jQuery from "jquery"
import random from "random"
import Swal from "sweetalert2"
import { encode,decode } from "js-base64"
export default class Utility {
    CTX_admin = "admin"
    CTX_guest = "guest"
    CTX_coach = "coach"
    CTX_user  = "user"
    constructor(ctx=this.CTX_admin||this.CTX_guest||this.CTX_coach||this.CTX_user ) {
        this.svg_icons = {
            success: `
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 128 128">
                        <path fill="#fff" d="M64,14c27.6,0,50,22.4,50,50c0,27.6-22.4,50-50,50c-27.6,0-50-22.4-50-50C14,36.4,36.4,14,64,14"></path><path fill="#e6e7e7" d="M64,14c-0.2,0-0.4,0-0.6,0c-1.5,0-3.1,0.1-4.6,0.3c-0.3,0-0.7,0.1-1,0.1 c24.6,3.1,43.7,24.1,43.7,49.6c0,25.5-19.1,46.5-43.7,49.6c0.5,0.1,1,0.1,1.6,0.2c1.2,0.1,2.5,0.2,3.7,0.2c0.3,0,0.6,0,0.9,0 c27.6,0,50-22.4,50-50C114,36.4,91.6,14,64,14"></path><path fill="#454b54" d="M64,117c-29.2,0-53-23.8-53-53s23.8-53,53-53s53,23.8,53,53S93.2,117,64,117z M64,17 c-25.9,0-47,21.1-47,47s21.1,47,47,47s47-21.1,47-47S89.9,17,64,17z"></path><path fill="#454b54" d="M64 42.7c-1.7 0-3 1.3-3 3s1.3 3 3 3c1.7 0 3-1.3 3-3S65.7 42.7 64 42.7zM64 93c-1.7 0-3-1.3-3-3V62.3c0-1.7 1.3-3 3-3 1.7 0 3 1.3 3 3V90C67 91.7 65.7 93 64 93z"></path>
                    </svg>
                    `,
            info: `
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 128 128">
                        <circle cx="64" cy="64" r="55" fill="#fff"></circle><path fill="#444b54" d="M64,122C32,122,6,96,6,64S32,6,64,6s58,26,58,58S96,122,64,122z M64,12c-28.7,0-52,23.3-52,52s23.3,52,52,52 s52-23.3,52-52S92.7,12,64,12z"></path><path fill="#71c2ff" d="M64,90c-1.7,0-3-1.3-3-3V61c0-1.7,1.3-3,3-3s3,1.3,3,3v26C67,88.7,65.7,90,64,90z"></path><path fill="#71c2ff" d="M64,49c-1.7,0-3-1.3-3-3v-5c0-1.7,1.3-3,3-3s3,1.3,3,3v5C67,47.7,65.7,49,64,49z"></path>
                    </svg>
                    `,
            danger:`
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 128 128">
                        <path fill="#fff" d="M64 9A55 55 0 1 0 64 119A55 55 0 1 0 64 9Z" transform="rotate(-45.001 64 64.001)"></path><path fill="#444b54" d="M64,122c-15.5,0-30.1-6-41-17C12,94.1,6,79.5,6,64s6-30.1,17-41c11-11,25.5-17,41-17s30.1,6,41,17l0,0l0,0 c11,11,17,25.5,17,41s-6,30.1-17,41C94.1,116,79.5,122,64,122z M64,12c-13.9,0-26.9,5.4-36.8,15.2S12,50.1,12,64 s5.4,26.9,15.2,36.8S50.1,116,64,116s26.9-5.4,36.8-15.2S116,77.9,116,64s-5.4-26.9-15.2-36.8l0,0C90.9,17.4,77.9,12,64,12z"></path><path fill="#71c2ff" d="M68.2,64l11.3-11.3c1.2-1.2,1.2-3.1,0-4.2c-1.2-1.2-3.1-1.2-4.2,0L64,59.8L52.7,48.4c-1.2-1.2-3.1-1.2-4.2,0 c-1.2,1.2-1.2,3.1,0,4.2L59.8,64L48.4,75.3c-1.2,1.2-1.2,3.1,0,4.2c0.6,0.6,1.4,0.9,2.1,0.9s1.5-0.3,2.1-0.9L64,68.2l11.3,11.3 c0.6,0.6,1.4,0.9,2.1,0.9s1.5-0.3,2.1-0.9c1.2-1.2,1.2-3.1,0-4.2L68.2,64z"></path>
                    </svg>
                    `

        }
        this.loader = ()=>{return Swal.showLoading()}
        this.loader_hide =() => {return Swal.hideLoading()}
        this.decode = (a) =>{return decode(a)}
        this.encode = (a) =>{return encode(a)}
        this.QR = (options,id="qr-reader") => {return new Html5QrcodeScanner(id,options)}
        this.$ = jQuery
        
        this.show = (options) => {return Swal.fire(options)}
        this.lift_data = get().lift_data
        this.json = (a) =>{this.#_get_json(a);return this.#_json_data}
        this.regions = this.#_regions()
        this.cities = (a) => { 
            var data
            each(this.#_regions(),(k,v)=>{
                if(a==v.code){data=v.Cities;return false;}
            })
            return data
         }
        
        this.barangays = (a, b) => { 
            var data
            each(this.#_regions(),(i,v)=>{
                if(v.code==a){
                    each(v.Cities,(i,v)=>{
                        if(v.code == b){
                            data = v.Barangays
                            return false;
                        }
                    })
                    return false;
                }
            })
            return data
         }
        this.isNull = (a) => { return a == undefined }
        this.occurrences = (a, b, c = true) => { return this.#_occurrences(a, b, c) }
        this.url_builder = (a, b) => {return this.#_url_builder(a,b)}
        this.random = (min,max) => {return random.int(min,max)}
        this.random_color = (opacity = 0.2) =>{ return `rgba(${this.random(1,255)},${this.random(1,255)},${this.random(1,255)},${opacity})`}
        if(ctx == "guest"){

            this.trainers = (d)=>{
                var options = ""
                each(d,(k,v)=>{
                    each(v,(i,v)=>{
                    options+=`<option value="${v.name}"> ${v.name} </option>`
                        
                    })
                })
                return options
            }
        }
        if (ctx == "user") {
            
        }
        if (ctx == "admin"){
            this.mem_row = (a) => {return this.#_mem_table_row(a)}
            this.non_mem_row = (q,a) => {return this.#_non_mem_table_row(q,a)}
            this.getResult = (a) => { return this.#_get_res(a) }
            this.tab_contents = (a) => {return this.#_tab_contents(a)}
        }
    }
    
    
    #_url_builder(url,params){
        each(Object.keys(params),(i,v)=>{url+=`${i==0?"?":""}${i>0?"&":""}${v}=${params[v]}`})
        return url
    }
    #_json_data
    #_get_json(url){
            getJSON(url,(d)=>{
                this.#_json_data=d
            })
    }
    #_regions (){
        return get().regions
    }
    #_get_res(arr) {
        var data = arr.split(":")
        var res = ""
        for (var i = 1; i < data.length; i++) {

            res += i + 1 == data.length ? `${data[i]}` : `${data[i]}:`
        }
        return res
    }
    async sleep(s) {
        return new Promise(e => setTimeout(e, s * 1000))
    }
    
    #_barangays(reg_code, city_code) {
        var data;
        each(this.#_regions, (_i, v) => {
            if (v.code == reg_code) {
                each(v.Cities, (_i, v) => {
                    if (v.code == city_code) {
                        data = v.Barangays
                        return
                    }
                })
            }
        })
        return data
    }
    #_occurrences(string, subString, allowOverlapping = true) {

        string += "";
        subString += "";
        if (subString.length <= 0) return (string.length + 1);

        var n = 0,
            pos = 0,
            step = allowOverlapping ? 1 : subString.length;

        while (true) {
            pos = string.indexOf(subString, pos);
            if (pos >= 0) {
                ++n;
                pos += step;
            } else break;
        }
        return n;
    }
    #_mem_table_row(v) {
        return `
        <tr>
            <td>${v.id}</td>
            <td>${v.username}</td>
            <td>${v.email}</td>
            <td>${v.payment_status == 1 ? "Paid" : "Unpaid"}</td>
            <td>
            <div class="d-flex">
                <div class="btn-group">
                    <button class="btn btn-primary" view-key="${v.id}" type="view" >View</button>
                    <button class="btn border-0" disabled></button>
                    <button class="btn btn-secondary" edit-key="${v.id}" type="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                    <button class="btn border-0" disabled></button>
                    <button class="btn btn-danger"  del-key="${v.id}" type="delete">Delete</button>
                    <button class="btn border-0" disabled></button>
                </div>
                <div class="input-group">
                    <select class="form-select" id="membership_${v.id}" ${v.payment_status == 1 ? "disabled" : ""}>
                        <option value="0">Select Membership</option>
                        <option value="Basic">Basic</option>
                        <option value="Premium">Premium</option>
                    </select>
                    <button class="btn border-0" disabled></button>
                <button type="memb-set" class="btn btn-success" user_id="${v.id}" ${v.payment_status == 1 ? "disabled" : ""}>Set Membership</button>
            </div>
            </div>
            </td>
            
            <td>
            
            </td>
            <td></td>
        </tr>
                            `
    }
    #_non_mem_table_row(idx,v){
        var day = new Date()
        return `
            <tr>
                <td>{${day.getMonth()}-${day.getDate()}-${day.getFullYear()}}${idx}</td>
                <td>${v.firstname}</td>
                <td>${v.lastname}</td>
                <td>${v.time_in}</td>   
            </tr>
        `
    }
    #_join_bmis(d){
        var a = []
        each(d,(i,v)=>{
            a.push(`<tr><td>${v.height}</td><td>${v.weight}</td><td>${v.bmi}</td><td>${v.bmi_classification}</td></tr>`)
        })
        return a.join()
    }
    #_tab_contents(d){
        return `
        <div class="row text-center section-title" style="--color:${this.random_color(1)}"><h2>Profile</h2></div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Name:</strong></div>
            <div class="col-8"><span>${d.profile.firstName}  ${d.profile.lastName}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Username:</strong></div>
            <div class="col-8"><span>${d.user.username}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Email:</strong></div>
            <div class="col-8"><span>${d.user.email}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Region:</strong></div>
            <div class="col-8"><span>${d.profile.address_region}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>City:</strong></div>
            <div class="col-8"><span>${d.profile.address_city}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Barangay</strong></div>
            <div class="col-8"><span>${d.profile.address_barangay}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Street:</strong></div>
            <div class="col-8"><span>${d.profile.address_street_num}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Age:</strong></div>
            <div class="col-8"><span>${d.profile.age}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Contact Number:</strong></div>
            <div class="col-8"><span>${d.profile.contactDetails}</span></div>
        </div>
            <br>
        <div class="row text-center section-title" style="--color:${this.random_color(1)}"><h2>Membership</h2></div>
            <br>
        <div class="row">
            <div class="col-4"><strong>Membership Type:</strong></div>
            <div class="col-8"><span>${this.isNull(d.membership.membership_plan) ? "Not set" : d.membership.membership_plan}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Start Date:</strong></div>
            <div class="col-8"><span>${this.isNull(d.membership.start_date) ? "Not set" : d.membership.start_date}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Expiry Date:</strong></div>
            <div class="col-8"><span>${this.isNull(d.membership.expiry_date) ? "Not set" : d.membership.expiry_date}</span></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><strong>Trainer:</strong></div>
            <div class="col-8"><span>${this.isNull(d.membership.Trainer) ? "Not set" : d.membership.Trainer}</span></div>
        </div>
        <br>
        <div class="row text-center section-title" style="--color:${this.random_color(1)}"><h2>Assessment</h2></div>
        <br>
            <div class="row">
                <div class="col-4"><strong>Is Physically Fit:</strong></div>
                <div class="col-8"><span>${d.assessment.physically_fit == 1 ? "Yes" : "No"}</span></div>
            </div>
            <br>
            <div class="row">
                <div class="col-4"><strong>Had an Operation:</strong></div>
                <div class="col-8"><span>${d.assessment.operation == 1 ? "Yes" : "No"}</span></div>
            </div>
            <br>
            <div class="row">
                <div class="col-4"><strong>Had High Blood:</strong></div>
                <div class="col-8"><span>${d.assessment.high_blood == 1 ? "Yes" : "No"}</span></div>
            </div>
            <br>
            <div class="row">
                <div class="col-4"><strong>Has Heart Problem:</strong></div>
                <div class="col-8"><span>${d.assessment.heart_problem == 1 ? "Yes" : "No"}</span></div>
            </div>
            <br>
        <div class="row text-center"><h2>BMI Records</h2></div>

            <br>
        
        <table class="table">
                                <thead>
                                    <tr>
                                        <th>Height</th>
                                        <th>Weight</th>
                                        <th>BMI</th>
                                        <th>BMI Classification</th>
                                    </tr>
                                </thead>
                                <tbody id="bmi_records">
                                    ${this.#_join_bmis(d.bmis)}
                                </tbody>
                            </table>`
    
        
    }
}