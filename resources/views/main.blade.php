
   @extends('layout.app')
   @extends('layout.script')
   @section('content')
    <div class="main_wrapper">
        <div class="container">
            <div class="logo_des">
                <div class="logo">LOGO</div>
                <div class="desc">DESCRPTION</div>
            </div>
            <div class="btn_inp">
                <div class="create_btn"><input type="button" value="Create New Form" name="createnewform" id="createnewform"></div>
            <div class="inp_link"><input type="text" name="formlink" id="formlink"></div>
            <div class="sub_btn"><input type="button" value="Existing Link Form" name="existinglink" id="existinglink"></div>
            </div>
        </div>

    </div>
   @stop
