<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Category</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">
                {{--Table Data--}}
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>

    getList();

  async function getList() {
      showLoader();
      let res=await axios.get("/list-category");
      hideLoader();

      let tableData=$('#tableData');
      let tableList=$('#tableList');

      tableData.DataTable().destroy();
      tableList.empty();

      res.data.forEach(function (item,index) {
        let row = `<tr>
                        <td> ${index+1} </td>
                        <td> ${item['name']} </td>
                        <td>
                            <button data-id="${item['id']}" class='btn editBtn btn-sm btn-outline-success'> Edit </buton>
                            <button data-id="${item['id']}" class='btn deleteBtn btn-sm btn-outline-danger'> Delete </buton>
                        </td>
                    </tr>`

        tableList.append(row);
      });

      $('.editBtn').on('click', function (){
       let id = $(this).data('id');
        alert(id);
      });

      $('.deleteBtn').on('click', function (){
       let id = $(this).data('id');
          $('#delete-modal').modal('show');
          $('#deleteID').val(id);
      });

    // new DataTable('#tableData', {
    //   order: [[0,'desc']],
    //   lengthMenu:[5, 10, 20, 30,]
    // });

      tableData.DataTable({
        order:[[0,'asc']],
        lengthMenu:[5,10,15,20]

      })

    }


// getList();


//   async function getList() {

//       showLoader();
//       let res=await axios.get("/list-category");
//       hideLoader();


//       let tableData=$('#tableData');
//       let tableList=$('#tableList');

//       tableData.DataTable().destroy();
//       tableList.empty();



//       res.data.forEach(function (item,index) {
//           let row=`<tr>
//                     <td>${index+1}</td>
//                     <td>${item.name}</td>
//                     <td>
//                         <button data-id="${item.id}" class="btn edit btn-sm btn-outline-success">Edit</button>
//                         <button data-id="${item.id}" class="btn delete btn-sm btn-outline-danger">Delete</button>
//                     </td>
//                 </tr>`;
//           tableList.append(row);
//       })


//       $('.edit').on('click',function () {
//           let id=$(this).data('id');
//           alert(id)
//       })

//       $('.delete').on('click',function () {
//           let id=$(this).data('id');
//           alert(id)
//       })

//       tableData.DataTable({
//           order: [[0, 'desc']],
//           lengthMenu: [5,10,15,20,25,30,35,40,45,50],
//           language:{
//               paginate:{
//                   next: '&#8594;', // or '→'
//                   previous: '&#8592;' // or '←'
//               }}
//       })
//   }







</script>

