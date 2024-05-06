@extends("base")
@section("title","Register")

@section("content")
<form id="reg-form" action="{{ route('register.POST') }}" method="POST">
    @csrf
    <div class="row"><h3 class="text-center">Register</h3><br></div>
    <input type="hidden" name="newProfID" id="newProfID" value="{{ $count + 1 }}">
    <div class="row">
        <div class="col-1 text-center ">
            <label for="first-name" class="form-label">First Name:</label>
        </div>
        <div class="col-5 border-right-black">
            <input type="text" class="form-control" name="first_name" id="first-name" required
                placeholder="Enter your First Name">
        </div>
        <div class="col-1 text-center">
            <label for="last-name" class="form-label">Last Name:</label>
        </div>
        <div class="col-5">
            <input type="text" class="form-control" id="last-name" name="last_name" required
                placeholder="Enter your Last Name">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="contact-number" class="form-label">Contact Number: </label>
        </div>
        <div class="col-5">
            <input type="tel" name="contact_number" id="contact-number" class="form-control"
                placeholder="Enter Contact Number">
        </div>
        <div class="col-1 text-center">
            <label for="email" class="form-label">Email</label>
        </div>
        <div class="col-5">
            <input type="email" name="email" id="email" class="form-control"
                placeholder="Enter Email">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="username" class="form-label">Username:</label>
        </div>
        <div class="col-5">
            <input type="text" class="form-control" id="username" name="username" required
                placeholder="Enter your Username">
        </div>
        <div class="col-1 text-center">
            <label for="password" class="form-label">Password:</label>
        </div>
        <div class="col-5">
            <input type="password" class="form-control" id="password" name="password" required
                placeholder="Enter your Password">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="birthdate" class="form-label">Birthdate:</label>
        </div>
        <div class="col-5">
            <input type="date" name="birthdate" class="form-control" id="birthdate" required>
        </div>
        <div class="col-1 text-center">
            <label for="address-num" class="form-label">Address Number:</label>
        </div>
        <div class="col-5">
            <input type="text" class="form-control" id="address-num" name="address_num"required
                placeholder="Enter your Address Number">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="address-street" class="form-label">Address Street:</label>
        </div>
        <div class="col-5">
            <input type="text" class="form-control" name="address_street" id="address-street"
                required placeholder="Enter your Address Street">
        </div>
        <div class="col-1 text-center">
            <label for="address-city" class="form-label">Address City:</label>
        </div>
        <div class="col-5">
            <input type="text" class="form-control" id="address-city" name="address_city"
                required placeholder="Enter your Address City">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="address-region" class="form-label">Address Region:</label>
        </div>
        <div class="col-5">
            <input type="text" class="form-control" name="address_region" id="address-region"
                required placeholder="Enter your Address Region">
        </div>
        <div class="col-1 text-center">
            <label for="height" class="form-label">Height:</label>
        </div>
        <div class="col-5">
            <input type="number" step="0.01" class="form-control" name="height" id="height"
                required placeholder="Enter your Height">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="weight" class="form-label">Weight:</label>
        </div>
        <div class="col-5">
            <input type="number" step="0.01" class="form-control" name="weight" id="weight"
                required placeholder="Enter your Weight">
        </div>
        <div class="col-1 text-center">
            <label for="medical-history" class="form-label">Medical History:</label>
        </div>
        <div class="col-5">
            <textarea class="form-control" id="medical-history" name="medical_history" rows="3" required
                placeholder="Enter your Medical History"></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="hasIllness" class="form-label">Has Illness:</label>
        </div>
        <div class="col-5">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="hasIllness" id="hasIllnessYes"
                    value="1">
                <label class="form-check-label" for="hasIllnessYes">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="hasIllness" id="hasIllnessNo"
                    value="0" checked>
                <label class="form-check-label" for="hasIllnessNo">
                    No
                </label>
            </div>
        </div>
        <div class="col-1 text-center">
            <label for="hasInjuries" class="form-label">Has Injuries:</label>
        </div>
        <div class="col-5">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="hasInjuries"
                    id="hasInjuriesYes" value="1">
                <label class="form-check-label" for="hasInjuriesYes">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="hasInjuries" id="hasInjuriesNo"
                    value="0" checked>
                <label class="form-check-label" for="hasInjuriesNo">
                    No
                </label>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="user-type" class="form-label">User Type:</label>
        </div>
        <div class="col-5">
            <select name="user_type" id="user-type" class="form-select" required>
                <option selected="">Select User Type</option>
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
        </div>
        <div class="col-1 text-center">
            <label for="membership-type" class="form-label">Membership Type:</label>
        </div>
        <div class="col-5">
            <select name="membership_type" id="membership-type" class="form-select" required>
                <option selected="">Select Membership Type</option>
                <option value="1">Member</option>
                <option value="2">Non-Member</option>
            </select>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="membership-desc" class="form-label">Membership Description:</label>
        </div>
        <div class="col-5">
            <input type="text" class="form-control" id="membership-desc" name="membership_desc"
                required placeholder="Enter your Membership Description">
        </div>
        <div class="col-1 text-center">
            <label for="membership-plan" class="form-label">Membership Plan:</label>
        </div>
        <div class="col-5">
            <select name="membership_plan" id="membership-plan" class="form-select">
                <option selected="">Select Membership Plan</option>
                <option value="1">Basic</option>
                <option value="2">Standard</option>
                <option value="3">Premium</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="payment-status" class="form-label">Payment Status:</label>
        </div>
        <div class="col-5">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_status"
                    id="payment-status-paid" value="1" checked>
                <label class="form-check-label" for="payment-status-paid">
                    Paid
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_status"
                    id="payment-status-unpaid" value="0">
                <label class="form-check-label" for="payment-status-unpaid">
                    Unpaid
                </label>
            </div>
        </div>
        <div class="col-1 text-center">
            <label for="trainer" class="form-label">Trainer:</label>
        </div>
        <div class="col-5">
            <input type="text" name="trainer" class="form-control" id="trainer" required
                placeholder="Enter your Trainer">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1 text-center">
            <label for="profile-bio" class="form-label">Profile Bio:</label>
        </div>
        <div class="col-11">
            <textarea class="form-control" id="profile-bio" rows="3" required placeholder="Enter your Profile Bio"
                name="profile_bio"></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
