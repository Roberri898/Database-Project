<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Apartment</title>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style type="text/css">
        /* Move down content because we have a fixed navbar that is 3.5rem tall */
        body
        {
            margin-top:40px;
            text-align: center;
        }
        .info_list
        {
            height:237px;
            overflow-y: scroll;
        }
        .bg_colored
        {
            background-color: rgb(179, 179, 255);
        }
        .container
        {
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .container input
        {
            width: 100%;
            clear: both;
        }
        .submit
        {
            vertical-align: center;
        }
        .linkbutton
        {
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-group">
        <form action="createapartment_send.php" method="POST">
            <div class="row">
                <div class="col-sm">
                    <label>Address #</label>
                </div>
                <div class="col-sm">
                    <label>Street</label>
                </div>
                <div class="col-sm">
                    <label>Street Number</label>
                </div>
                <div class="col-sm">
                    <label>City</label>
                </div>
                <div class="col-sm">
                    <label>State</label>
                </div>
                <div class="col-sm">
                    <label>County</label>
                </div>
                <div class="col-sm">
                    <label>Price</label>
                </div>
                <div class="col-sm">
                    <label>Occupied? (0/1)</label>
                </div>
            </div>
            <div class = "row">
                <div class="col-sm">
                    <input type="number" name="num">
                </div>
                <div class="col-sm">
                    <input type="text" name="st">
                </div>
                <div class="col-sm">
                    <input type="number" name="sn">
                </div>
                <div class="col-sm">
                    <input type="text" name="ct">
                </div>
                <div class="col-sm">
                    <input type="text" name="sta">
                </div>
                <div class="col-sm">
                    <input type="text" name="cou">
                </div>
                <div class="col-sm">
                    <input type="number" name="ap">
                </div>
                <div class="col-sm">
                    <input type="number" name="oc">
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <label>Square Footage</label>
        </div>
        <div class="col-sm">
            <label>Bedrooms</label>
        </div>
        <div class="col-sm">
            <label>Bathrooms</label>
        </div>
        <div class="col-sm">
            <label>Pool</label>
        </div>
        <div class="col-sm">
            <label>Amenities</label>
        </div>
    </div>
    <div class = "row">
        <div class="col-sm">
            <input type="number" name="sf">
        </div>
        <div class="col-sm">
            <input type="number" name="bed">
        </div>
        <div class="col-sm">
            <input type="number" name="bath">
        </div>
        <div class="col-sm">
            <input type="number" name="pool">
        </div>
        <div class="col-sm">
            <input type="number" name="am">
        </div>
    </div>
</div>
<div class="container linkbutton">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</body>
</html>