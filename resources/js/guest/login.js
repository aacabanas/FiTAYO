import Utility from "../utils/utility";

var utils = new Utility(Utility.CTX_guest)

utils.$("#login").on("click",()=>{
    utils.show({
        title: "Login",
        html:utils.$(".login-header").html()
        
    })
})