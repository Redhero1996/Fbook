@if (session('status'))
<div id="phone_modal" class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header top-phone">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('page.addNumber') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-phone">
                        <div class="error-phone"></div>
                        {!! Form::text('phone', null, ['id' => 'phone_value', 'required', 'class' => 'form-control']) !!}
                        <div class="phone-display">
                            <div class="display">
                                <h4>{{ trans('page.display') }}</h4>
                            </div>
                            <ul>
                                <li>
                                    {!! Form::radio('result', '1', true, ['class' => 'message_pri', 'id' => 'f-option']) !!}
                                    <label for="f-option">{{ trans('page.public') }}</label>
                                    <div class="check"></div>
                                </li>
                                <li>
                                    {!! Form::radio('result', '0', false, ['class' => 'message_pri', 'id' => 's-option']) !!}
                                    <label for="s-option">{{ trans('page.private') }}</label>
                                    <div class="check"><div class="inside"></div></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button(trans('page.addPhone'), ['id' => 'modal_phone', 'class' => 'btn btn-info']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
