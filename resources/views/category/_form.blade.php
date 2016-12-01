<div class="panel-body">
    <div class="row">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="col-sm-12">
            <div class="form-group required">
                {{ Form::label(trans('category.attr.name'), null, ['reviews' => 'control-label']) }}
                {{ Form::text('name', isset($review->user_id) ? $review->user_id : null, ['class' => 'form-control']) }}
                <div class="help-block">{{ $errors->has('user_id') ? $errors->first('user_id') : '' }}</div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group required">
                {{ Form::label(trans('category.attr.description'), null, ['reviews' => 'control-label']) }}
                {{ Form::textarea('description', isset($review->product_id) ? $review->product_id : null, ['class' => 'form-control']) }}
                <div class="help-block">{{ $errors->has('product_id') ? $errors->first('product_id') : '' }}</div>
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">{{ trans('app.save')  }}</button>
        </div>

    </div>
</div>