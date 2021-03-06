<?=$this->setSiteTitle($user->username);?>
<?=$this->start('head');?>
<?=$this->end('head');?>
<?=$this->start('body');?>
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8 bg-white h-100">
      <div class="row bg-light shadow-sm rounded py-3">
        <div class="col-md-12">
          <a href="/user/show/<?=$user->id?>" title="" class="badge badge-info ml-2 rounded p-1 badge-info badge rounded">ID - 1</a>
          <!-- Large modal -->
          <a class="float-right shadow-sm btn btn-sm btn-outline-warning text-info mx-1" data-toggle="modal" data-target=".editUser" role="button" data-toggle="tooltip" title="Edit user">
            <small>Edit</small>
          </a>
          <?php include @ROOT . 'app/views/components/user/editUser.php'?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid p-0">
            <div class="row pt-3 pb-3">
              <div class="col-sm-2 col-md-2 col-lg-2 text-center px-0 mx-0">
                <span class="">
                  <i class="fa fa-address-card fa-5x text-danger my-1 p-1"></i>
                </span>
              </div>
              <div class="col-sm-10 col-md-10 col-sm-10 my-1">
                <h5 class="d-inline-block h4 mx-2"><?=@ucwords($user->firstName . ' ' . $user->surname)?></h5>
                <span class="badge badge-info p-2 rounded float-right"><?=@ucwords($user->role)?></span>
                <address>

                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row bg-light shadow-sm border-top border-light">
        <div class="col-md-12">
          <div class="container-fluid pl-0 pr-0">
            <div class="row px-0 mx-0 my-1 py-1">
              <div class="col-md-6 pt-1 pb-1">
                <span style="font-size: 0.94em;" class="text-left border-secondary float-left mr-2">
                  <i class="fa-fw fa fa-envelope text-danger mx-1"></i>
                  <span class="text-dark"><?=@$user->email?>
                  </span>
                </span>
                <span style="font-size: 0.94em;" class="text-left border-secondary float-left mx-1">
                  <i class="fa-fw fa fa-phone text-success mx-1"></i>
                  <span class="text-dark">
                    <?php if (isset($user->phone)): ?>
                      <?=@$user->phone?>
                    <?php else: ?>
                      <small class="text-muted">Not Defined</small>
                    <?php endif?>
                  </span>
                </span>
              </div>
              <div class="col-md-6 pt-1 pb-1">
                <span style="font-size: 0.94em;" class="text-right border-secondary float-right mx-1">
                  <i class="fa-fw fa fa-refresh text-warning mx-1"></i>
                  <span class="text-dark"><?=@date_format($user->created_at, 'd.m.Y')?>
                  </span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row border">
        <div class="col-md-6 pr-0 pl-0 bg-white border-top">
          <div class="container-fluid pr-0 pl-0">
            <dl class="row pl-0 pr-0 ml-0 mr-0 p-2">
              <dt class="col-md-8 offset-1 my-2 shadow-sm rounded p-2 text-truncate">Companies Registered</dt>
              <dd class="col-md-1 my-2 p-2 shadow-sm badge-danger badge"><?=@$user->companies->count()?></dd>
               <dt class="col-md-8 offset-1 my-2 shadow-sm rounded p-2 text-truncate">Candidates Registered</dt>
              <dd class="col-md-1 my-2 p-2 shadow-sm badge-danger badge"><?=@$user->candidates->count()?></dd>
              <dt class="col-md-8 offset-1 my-2 shadow-sm rounded p-2 text-truncate">Recruitment Processes</dt>
              <dd class="col-md-1 my-2 p-2 shadow-sm badge-danger badge"><?=@$user->recruitments->count()?></dd>
            </dl>
          </div>
        </div>
        <div class="col-md-6 pr-0 pl-0 bg-white border-top">
          <div class="container-fluid pr-0 pl-0">
            <dl class="row pl-0 pr-0 ml-0 mr-0 p-2">
              <dt class="col-md-8 offset-1 my-2 shadow-sm rounded p-2 text-truncate">Jobs Registered</dt>
              <dd class="col-md-1 my-2 p-2 shadow-sm badge-danger badge"><?=@$user->jobs->count()?></dd>
              <dt class="col-md-8 offset-1 my-2 shadow-sm rounded p-2 text-truncate">Contacts Registered</dt>
              <dd class="col-md-1 my-2 p-2 shadow-sm badge-danger badge"><?=@$user->contacts->count()?></dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
    <!-- right column -->
    <div class="col-md-4">
      <div class="row ml-2 bg-light rounded">
        <div class="col-md-12 shadow-sm border-bottom">
          <div class="container-fluid">
            <div class="row text-center pt-3 pb-3">
              <a
                class="shadow-sm btn btn-sm btn-outline-success"
                id="modal-221164"
                href="#modal-container-221164"
                role="button"
                data-toggle="modal"
                title="Add Note">
                <small>Add Note</small>
              </a>
              <div class="modal fade" id="modal-container-221164" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <form action="/note/store" method="post" accept-charset="utf-8" class="noteForm">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                        Add Note
                        </h5>
                      </div>
                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <input type="hidden" name="user_id" value="<?=@$_SESSION['uid']?>">
                            <input type="hidden" name="user_id" value="<?=@$user->id?>">
                            <textarea class="form-control" aria-label="Note" name="note"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">
                        Save
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                        Close
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row ml-2 rounded">
        <div class="col-md-12 pl-0 pr-0">
          <ul class="nav nav-tabs m-0 bg-light">
            <li class="nav-item mt-2 bg-outline-success rounded shadow-sm">
              <a href="#note" class="nav-link text-dark active" data-toggle="tab">Note</a>
            </li>
            <li class="nav-item mt-2 bg-outline-success rounded shadow-sm">
              <a href="#files" class="nav-link text-dark" data-toggle="tab">Files</a>
            </li>
          </ul>
          <div class="tab-content bg-white shadow-sm rounded p-2" style="min-height: 50vh">
            <div class="tab-pane fade show active" id="note">
              <div class="container-fluid pr-0 pl-0">
                <div class="row pl-0 pr-0">
                  <?php foreach ($user->notes->where('user_id', '!=', $user->id)->all() as $note): ?>
                  <div class="col-md-12 text-dark">
                    <div class="alert alert-success shadow-sm p-1" role="alert">
                      <span class="p-1 d-inline-block">
                        <?=@$note->note?>
                      </span><br>
                      <span class="badge badge-light border border-light shadow-sm m-0 p-1 text-muted mt-3">Added By: <?=@$note->user->username . ' at ' . @date_format(@$note->created_at, 'h:m d.m.Y')?></span>
                    </div>
                  </div>
                  <?php endforeach?>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="files">
              <div class="container-fluid pr-0 pl-0">
                <div class="row pl-0 pr-0">
                  <?php for ($i = 1; $i <= 10; $i++): ?>
                  <div class="col-md-12">
                    <div class="alert alert-info shadow-sm shadow-sm" role="alert">
                      This is a warning alert—check it out!
                      This is a warning alert—check it out!
                      This is a warning alert—check it out!
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="alert alert-info shadow-sm shadow-sm" role="alert">
                      This is a warning alert—check it out!
                      This is a warning alert—check it out!
                      This is a warning alert—check it out!
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="alert alert-info shadow-sm shadow-sm" role="alert">
                      This is a warning alert—check it out!
                      This is a warning alert—check it out!
                      This is a warning alert—check it out!
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="alert alert-info shadow-sm alert-dismissible fade show" role="alert">
                      <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                  <?php endfor?>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="messages">
              <p>Messages tab content ...</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
    </div>
  </div>
</div>
<?=$this->end('body');?>