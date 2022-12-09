<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .main-body{
        width:100%;
        text-align: center;
    }
    .section {
        border:1px solid;
        margin-top:20px;

        text-align:left;
        padding:20px;
    }

    .group{
        display:inline-block;
    }

    label{
        display:block;
    }

    .row{
        display:inline-block;
    }

</style>
<body>
    <div class="main-body">
        <div>VISIT REQUEST FORM</div>
        <div>DATE:<input type="text"></div>

        <div class="personal-information section">
            <div class="row">
                <div class="group">
                    <label>Patient Name</label>
                    <input type="text">
                </div>
                <div class="group">
                    <label>Date of Birth</label>
                    <input type="text">
                </div>
            </div>

            <div class="row">
                <div class="group">
                    <label>Sex</label>
                    <input type="checkbox">MALE
                    <input type="checkbox">FEMALE
                </div>
                <div class="group">
                    <label>Phone Number</label>
                    <input type="text">
                </div>
                <div class="group">
                    <label>Language(s)</label>
                    <input type="text">
                </div>
                
            </div>

            <div class="row">
                <label>Address</label>
                <input type="text">
            </div>
        </div>

        <div class="insurance-information section">
            <div class="row">
                <div class="group">
                    <label>Medicare Part B Insurance ID Number</label>
                    <input type="text">
                </div>
                <div class="group">
                    <label>Social Security Number</label>
                    <input type="text">
                </div>
            </div>
        </div>

        <div class="type-of-visit section">
            <div class="row">
                <input type="checkbox">Home Visit (Physical)
                <input type="checkbox">Telehealth
                <input type="checkbox">Either
            </div>
        </div>

        <div class="reason-for-visit-request section">
            <div class="row">
                <input type="checkbox">Referral to Home Health 
                <div class="group">
                    <input type="checkbox">Discharge from Hospital
                    <label>Details:</label>
                </div>
                <label>Discharge Date:</label>
            </div>

            <div class="row">
                <input type="checkbox">Follow-up Visit
                <div class="group">
                    <input type="checkbox">Other reason (Please Specify)
                    <label>Specify:</label>
                </div>
            </div>

            <div class="row">
                <input type="checkbox">Transfer of care
            </div>

            <div class="row">
                Additional Comment
                <textarea></textarea>
            </div>

        </div>

        <div class="prefferred-facility-home-health-care-agency section">
            <div class="row">
                <div class="group">
                    <label>Name of Facility / Home Health Care Agency</label>
                    <input type="text">
                </div>
                <div class="group">
                    <label>Name of Contact Person (if Any)</label>
                    <input type="text">
                </div>
            </div>

            <div class="row">
                <div class="group">
                    <label>Phone Number</label>
                    <input type="text">
                </div>
                <div class="group">
                    <label>Fax Number</label>
                    <input type="text">
                </div>
                <div class="group">
                    <label>Email Address</label>
                    <input type="text">
                </div>
            </div>

            <div class="row">
                <label>Address</label>
                <input type="text">
            </div>
        </div>

        <div class="prefferred-certifying-md section">
            <div class="row">
                <input type="checkbox">DR. MARIA LOURDES C. DELEON 
                <input type="checkbox">DR. LINDA B. ENRIQUEZ
                <input type="checkbox">DR. DAISY I. BAUTISTA
            </div>

        </div>


    </div>
    
</body>
</html>