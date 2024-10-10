import Utility from "../utils/utility";

var utils = new Utility(Utility.CTX_admin)
var qr = utils.QR({ fps: 20, qrbox: { width: 250, height: 250 } }, 'qr-reader')
qr.render(
    (d) => {
        var data = JSON.parse(utils.decode(d))
        utils.show({
            title:"Data",
            html: `<h1>${data.id}: ${data.username}</h1>`
        }).then((d)=>{
            if(d.isConfirmed){
                utils.show({
                    title:"Done",
                    iconHtml:utils.svg_icons.success
                })
            }
        })

    })
utils.$("#test-btn").on("click", (e) => {
    utils.show({
        title: "The Internet?",
        text: "That thing is still around?",
        icon: "question"
    });
})


/* var quotes = utils.quotes()
console.log(quotes[0]) */
window._load_users = (load = true) => {
    if (load) {
        utils.$("#members-list").html("")
        utils.$.getJSON("/users", (data) => {
            utils.$.each(data, (_i, v) => {
                utils.$("#members-list").append(utils.mem_row(v))
            })
            load_functions()
        })
    }
}
window._load_non_mem = (load = true) => {
    if (load) {
        utils.$("#non-members-list").html("")
        utils.$.getJSON("/users/non-members", (data) => {
            utils.$.each(data, (i, v) => {
                utils.$("#non-members-list").append(utils.non_mem_row(i + 1, v))
            })
        })
    }
}
console.log(utils.$.each([1, 2, 3, 4, 5, 6, 7, 8], (i, v) => { return v }))
function load_functions() {
    utils.$("button[type='view']").each((_i, v) => {
        var id = utils.$(v).attr("view-key")
        utils.$(v).on("click", (_e) => {
            utils.$("#edit").attr("edit_id", id)
            utils.$("#delete").attr("delete_id", id)
            utils.$.getJSON(utils.url_builder("/user", { id: id }), (d) => {

                utils.show({
                    iconHtml: utils.svg_icons.info,
                    customClass: "swal-lg",
                    html: utils.tab_contents(d)
                })
            })

        })
    })
    utils.$("button[type='delete']").each((_, v) => {
        var id = utils.$(v).attr("del-key")
        utils.$(v).on("click", () => {
            utils.show({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                iconHtml: utils.svg_icons.danger,
                showCancelButton: true,
                confirmButtonColor: utils.random_color(1),
                cancelButtonColor: utils.random_color(1),
                confirmButtonText: "Yes, delete it!",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    utils.$.getJSON(utils.url_builder("/delete/user", { id: id }), (data) => {
                        utils.$("#members-list").html("")
                        utils.show({
                            title: "Deleted",
                            text: data.response,
                            icon: "success"
                        })
                        _load_users()
                    })
                }
            })
        })

    })
    utils.$("button[type='memb-set']").each((_i, v) => {
        var id = utils.$(v).attr("user_id")
        utils.$(v).on("click", (_e) => {
            var memb = utils.$(`#membership_utils.${id}`).val()
            if (memb == 0) {
                return
            }
            utils.$.getJSON(utils.url_builder("/confirm", { id: id, membership: memb }), (d) => {
                utils.show({
                    title: "Success",
                    text: `utils.${d.response}`,
                    icon: "success", allowOutsideClick: false, timer: 2000
                });
            })
            utils.$("#members-list").html("")
            _load_users()

        })

    })
    return 1
}

utils.$("#refresh").on("click", () => {
    utils.$("#members-list").empty()
    utils.show({
        title: "Refresh",
        text: "Please wait while we are refreshing the data",
        iconHtml: utils.svg_icons.info,
        showConfirmButton: false,
        allowOutsideClick: false,
        timer: 2000

    }).then(async (d) => {
        await utils.sleep(2)

        utils.show({
            title: "Success",
            text: "Data successfully reloaded",
            iconHtml: utils.svg_icons.success,
            showConfirmButton: false,
            allowOutsideClick: false,
            timer: 2000
        })
        _load_users()
    });

})


utils.$.each(utils.regions, (i, v) => {
    utils.$("#region").html(utils.$("#region").html() + `<option region_code="utils.${v.code}" value="utils.${v.name}">utils.${v.name}</option>`)
})
utils.$("#region").on("change", (e) => {
    e.preventDefault()
    var reg_code = utils.$("#region option:selected").attr("region_code")
    if (reg_code == "None") {
        utils.$("#city").empty().html('<option city_code="None" selected>Choose a City</option>')
        utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
        return
    }
    utils.$("#city").empty().html('<option city_code="None" selected>Choose a City</option>')
    utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
    utils.$.each(utils.cities(reg_code), (i, v) => {
        utils.$("#city").html(utils.$("#city").html() + `<option city_code="utils.${v['code']}" value="utils.${v['name']}">utils.${v['name']}</option>`)
    })


})
utils.$("#city").on("change", (e) => {
    e.preventDefault()
    var reg_code = utils.$("#region option:selected").attr("region_code")
    var city_code = utils.$("#city option:selected").attr("city_code")
    if (city_code == "None" || reg_code == "None") {
        utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
        return
    }
    utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
    utils.$.each(utils.barangays(reg_code, city_code), (i, v) => {
        utils.$("#barangay").html(utils.$("#barangay").html() + `<option value="utils.${v.name}">utils.${v.name}</option>`)
    })

})
//setInterval(()=>{console.clear()},1000)
utils.$("#search_member").on('keyup', () => {
    var td = utils.$(this).val().toString().toLowerCase().includes("username:") ? "td:eq(1)" : (utils.$(this).val().toString().toLowerCase().includes("email:") ? "td:eq(2)" : "td:eq(0)")
    var val = utils.$(this).val().toString().toLowerCase().includes(":") ? utils.getResult(utils.$(this).val().toString().toLowerCase()) : utils.$(this).val().toString().toLowerCase()
    utils.$("#mem-list>tbody>tr").filter(function () {
        utils.$(this).toggle(utils.$(this).find(td).text().toLowerCase().indexOf(val) > -1)
    })
})
utils.$("#search_non_member").on('keyup', () => {
    var td = utils.$("#search_non_member").val().toString().toLowerCase().includes("first:") ? "td:eq(1)" : (utils.$("#search_non_member").val().toString().toLowerCase().includes("last:") ? "td:eq(2)" : "td:eq(0)")
    var val = utils.$("#search_non_member").val().toString().toLowerCase().includes(":") ? utils.getResult(utils.$("#search_non_member").val().toString().toLowerCase()) : utils.$("#search_non_member").val().toString().toLowerCase()
    utils.$("#non-mem-list>tbody>tr").filter(function () {
        utils.$(this).toggle(utils.$(this).find(td).text().toLowerCase().indexOf(val) > -1)
    })
})
utils.$("#close_modal,#alt_close").on("click", (e) => {
    utils.$("#bmi_records").empty()
    utils.$("#profile").empty()
    utils.$("#assessment").empty()
    utils.$("#membership").empty()
})