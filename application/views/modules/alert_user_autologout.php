<div class="modal fade" id="alert_user_autologout" tabindex="-1" role="dialog" aria-labelledby="alert_user_autologout" data-action-url="{{ site_url('ajax/authentication/user/verify_sessionID') }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <h2 class="alert-cookie">Someone attempted to log into your account using other device / browser. Your session will end now.</h2>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="text-center">
          <button type="button" class="btn btn-primary" data-okay>Okay</button>
        </div>
      </div>
    </div>
  </div>
</div>