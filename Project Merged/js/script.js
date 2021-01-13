$(document).ready(function(){

  //creating editable member table
  var dataTable = $('#member_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      url: "./includes/fetch.php",
      type: "POST"
    },
    "columnDefs": [{
      "targets": [ 5,6],//stops ordering on column 5 and 6
      "orderable": false,
    },],
    "language": {
      "searchPlaceholder": "Name,Id,Department Or Position",//placeholder for search field
    },

    initComplete: function () {
      $('.dataTables_filter input[type="search"]').css({ 'width': '300px', 'display': 'inline-block' }); //changing search box css
    },
  });

  //creating non-editable member table
  var dataTable = $('#member_table_small').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      url: "./includes/fetch_small_table.php",
      type: "POST"
    },

    "language": {
      "searchPlaceholder": "Name,Id,Department Or Position",//placeholder for search field
    },

    initComplete: function () {
      $('.dataTables_filter input[type="search"]').css({ 'width': '300px', 'display': 'inline-block' }); //changing search box css
    },
  });
    
    
    $('#add_button').click(function () {
    $('#user_form')[0].reset();
    $('.modal-title').text("Add Member");
    $('#action').val("Add");
    $('#operation').val("Add");
  });

  $('#add_button2').click(function () {
    $('#exec_user_form')[0].reset();
    $('.modal-title').text("Add Executive Member");
    $('#action2').val("Add_exc");
    $('#operation2').val("Add_exc");
    $('#mem_uploaded_image').html('');
  });


  //when a new member is being added
  $(document).on('submit', '#user_form', function (event) {
    event.preventDefault();//stops the summission of form
    var memName = $('#name').val();
    var stdId = $('#id').val();
    var dept = $('#dept_id').val();
    var memEmail = $('#email').val();
    var memPhone = $('#phone').val();
    var memPosition = $('#position').val();
    var dateJoined = $('#date_joined').val();
    
    //check if any field is empty
    if (memName != '' && stdId != '' && dept != '' && memEmail != '' && memPhone != '' && memPosition != '' && dateJoined != '') {
      $.ajax({
        url: "./includes/member_inc.php",
        method: 'POST',
        data: new FormData(this),//passing form data through ajax
        contentType: false,
        processData: false,
        success: function (data) {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModal').modal('hide');
          dataTable.ajax.reload(); //reloading member table
        }
      });
    }
    else {
      alert("All Fields are Required");
    }
  });

  //for adding executive_member
  $(document).on('submit', '#exec_user_form', function (event) {
    event.preventDefault();//stops the summission of form
    var memName = $('#name2').val();
    var stdId = $('#id2').val();
    var dept = $('#dept_id2').val();
    var memEmail = $('#email2').val();
    var memPhone = $('#phone2').val();
    var memPosition = $('#position2').val();
    var dateJoined = $('#date_joined2').val();
    var extension = $('#mem_image').val().split('.').pop().toLowerCase();

    if (extension != '') {
      //returns false if invalid image file is uploaded
      if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        alert("Invalid Image File");
        $('#mem_image').val('');
        return false;
      }
    } 

    //check if any field is empty
    if (memName != '' && stdId != '' && dept != '' && memEmail != '' && memPhone != '' && memPosition != '' && dateJoined != '') {
      $.ajax({
        url: "./includes/member_inc.php",
        method: 'POST',
        data: new FormData(this),//passing form data through ajax
        contentType: false,
        processData: false,
        success: function (data) {
          alert(data);
          $('#exec_user_form')[0].reset();
          $('#execUserModal').modal('hide');
        }
      });
    }
    else {
      alert("All Fields are Required");
    }
  });
  
  //When a member info is being updated
  $(document).on('click', '.update', function () {
    var user_id = $(this).attr("id");
    $.ajax({
      url: "./includes/fetch_single.php",
      method: "POST",
      data: { user_id: user_id },
      dataType: "json",
      success: function (data) {
        //updating modal attribute values
        $('#userModal').modal('show');
        $('#name').val(data.Name);
        $('#id').val(data.NsuId);
        $('#dept_id').val(data.Dept_id);
        $('#email').val(data.Email);
        $('#phone').val(data.PhoneNum);
        $('#position').val(data.Position);
        $('#date_joined').val(data.Date_Joined);
        $('.modal-title').text("Edit Member");
        $('#user_id').val(user_id);
        $('#action').val("Edit");
        $('#operation').val("Edit");
      }
    })
  });

  $(document).on('click', '.update2', function () {
    var user_id2 = $(this).attr("id");
    $.ajax({
      url: "./includes/fetch_single.php",
      method: "POST",
      data: { user_id2: user_id2 },
      dataType: "json",
      success: function (data) {
        //updating modal attribute values
        $('#execUserModal').modal('show');
        $('#name2').val(data.Name);
        $('#id2').val(data.NsuId);
        $('#dept_id2').val(data.Dept_id);
        $('#email2').val(data.Email);
        $('#phone2').val(data.PhoneNum);
        $('#position2').val(data.Position);
        $('#date_joined2').val(data.Date_Joined);
        $('.modal-title').text("Edit Executive Member");
        $('#user_id2').val(user_id2);
        $('#mem_uploaded_image').html(data.mem_image)
        $('#action2').val("Edit");
        $('#operation2').val("Edit");
      }
    })
  });

  //When a member info is being deleted
  $(document).on('click', '.delete', function () {
    var user_id = $(this).attr("id");
    if (confirm("Are you sure you want to delete this?")) {
      $.ajax({
        url: "./includes/delete_member.php",
        method: "POST",
        data: { user_id: user_id },
        success: function (data) {
          alert(data);
          dataTable.ajax.reload();
        }
      });
    }
    else {
      return false;
    }
  });
  
  //following a club
  $(document).on('click', '.follow_club', function () {
    var club_id = $(this).attr("id");
    $.ajax({
      url: "./includes/follow_club.php",
      method: "POST",
      data: { club_id: club_id },
      success: function (data) {
         
         window.location.reload();//reloads page
      }
    })
  });

  //unfollowing a club
  $(document).on('click', '.unfollow_club', function () {
    var club_id = $(this).attr("id");
    $.ajax({
      url: "./includes/unfollow_club.php",
      method: "POST",
      data: { club_id: club_id },
      success: function (data) {
        
        window.location.reload();//reloads page
      }
    })
  });
  
  //Filling the modal fields with existing values
  //for editing user info
  $(document).on('click', '.edit_button', function () {
    var user_id = $(this).attr("id");
    $.ajax({
      url: "./includes/fetch_single_user.php",
      method: "POST",
      data: { user_id: user_id },
      dataType: "json",
      success: function (data) {
        //updating modal attribute values
        $('#Edit_User_Modal').modal('show');
        $('#fname').val(data.First_Name);
        $('#lname').val(data.Last_Name);
        $('#alt_email').val(data.Alt_Email);
      }
    })
  });
  
  //after submitting edited info
  $(document).on('submit', '#edit_user_form', function (event) {
    event.preventDefault();//stops the summission of form

    var lname = $('#lname').val();
    var username = $('#username').val();
    
    //check if any field is empty
    if (lname != '' && username != '') {
      $.ajax({
        url: "./includes/update_user_info.php",
        method: 'POST',
        data: new FormData(this),//passing form data through ajax
        contentType: false,
        processData: false,
        success: function (data) {
          alert(data);
          $('#edit_user_form')[0].reset();
          $('#Edit_User_Modal').modal('hide');
          window.location.reload();//reloads page
        }
      });
    }
    else {
      alert("Please fill all necessary fields.");
    }
  });


});




