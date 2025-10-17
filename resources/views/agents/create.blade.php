@include('layout.head')
<div class="container">
    <h2>Add Agent</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
@include('agents.form')
<button type="submit" class="btn btn-success mt-3">Save</button>
        <a href="{{ route('agents.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
        <!-- Page sidebar end-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="row page-title">
              <div class="col-sm-6">
                <h3>Project Create</h3>
              </div>
              <div class="col-sm-6">
                <nav>
                  <ol class="breadcrumb justify-content-sm-end align-items-center">
                    <li class="breadcrumb-item"> <a href="index-2.html">
                        <svg class="svg-color">
                          <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Project</li>
                    <li class="breadcrumb-item active">Project Create</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12"> 
                <div class="card">
                  <div class="card-body">
                    <div class="form theme-form">
                      <div class="row">
                        <div class="col"> 
                          <div class="mb-3">
                            <label>Project Title</label>
                            <input class="form-control" type="text" placeholder="Project name *">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label>Client name</label>
                            <input class="form-control" type="text" placeholder="Name client or company name">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Project Rate</label>
                            <input class="form-control" type="text" placeholder="Enter project Rate">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Project Type</label>
                            <select class="form-select">
                              <option>Hourly</option>
                              <option>Fix price</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Priority</label>
                            <select class="form-select">
                              <option>Low</option>
                              <option>Medium</option>
                              <option>High</option>
                              <option>Urgent</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Project Size</label>
                            <select class="form-select">
                              <option>Small</option>
                              <option>Medium</option>
                              <option>Big</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Starting date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label>Ending date</label>
                            <input class="datepicker-here form-control" type="text" data-language="en">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label>Enter some Details</label>
                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label>Upload project file</label>
                            <form class="dropzone" id="singleFileUpload" action="https://admin.pixelstrap.net/upload.php">
                              <div class="dz-message needsclick"><i class="icon-cloud-up"></i>
                                <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="text-end"><a class="btn btn-success me-3" href="#">Add</a><a class="btn btn-danger" href="#">Cancel</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts -->
        </div>
@include('layout.footer')