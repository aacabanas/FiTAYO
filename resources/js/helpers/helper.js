
import jQuery from "jquery"
var j = jQuery
class credential {
    
    constructor(data) {
        this.username = data['username']
        this.user_type = TYPE.getType(data['user_type'])
        this.email = data['email']
        this.user_id = data['user_ID']
        
    }
}    
class assessment{
    constructor(data) {
        
       this.height = data['height']
        this.weight = data['weight']
        this.bmi = data['bmi']
        this.bmi_classification = data['bmi_classification']
        this.medical_history = data ['medical_history']
        this.hasIllness = data['hasIllness']+1
        this.hasInjuries = data['hasInjuries']+1 
    }
}
class profile{
    constructor(data){
        this.firstName = data['firstName']
        this.lastName = data['lastName']
        this.profileBio = data['profileBio']
        this.contactDetails = data['contactDetails']
        this.birthdate = data['birthdate']
        this.address_num = data['address_num']
        this.address_street = data['address_street']
        this.address_city = data['address_city']
        this.address_region = data['address_region']
    }
}
class membership{
    constructor(data){
        this.membership_type = (data['membership_type']=="Member")? 1:2 
        this.membership_desc = data['membership_desc']
        this.membership_plan = PLAN.getPlan(data['membership_plan'])
        this.start_date = data['start_date']
        this.expiry_date = data['expiry_date']
        this.next_payment = data['next_payment']
        this.payment_status = data['payment_status']+1
        this.trainer = data['Trainer']
    }
}
class PLAN{
    static getPlan(plan){
        return {"Basic":1,"Standard":2,"Premium":3}[plan]
    }
}
class TYPE{
    static getType(type){
        return {"user":2,"admin":1}[type]
    }
}
export class user {
    static credential_data = function(cred){
        return new credential(cred)
    }
    static profile_data = function(prof){
        return new profile(prof)
    }
    static assess_data = function(assess){
        return new assessment(assess)
    }
    static membership_data = function(mem){
        return new membership(mem)
    }
    
}