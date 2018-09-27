@extends('frontend.layouts.app')

@section('title', "Submit test results" . ' | ' . app_name())

@section('content')
<style type="text/css">
.custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 5px 10px;
  }
</style>
<style src="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</style>
    @include('../../includes/partials/link-check')
    <div class="card" style="margin-top: 25px;">
        <div style="overflow: hidden;">
            <div style="background: linear-gradient(rgba(27, 40, 56, 0.12), rgba(27, 40, 56, 0.60)), url(https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg); background-size: cover; background-position: center; width: 100%; height: 350px; -webkit-filter: blur(3px); -moz-filter: blur(3px); -o-filter: blur(3px); -ms-filter: blur(3px); filter: blur(3px);">
            </div>
        </div>
        <div style="width: 100%; height: 350px; position: absolute;">
            <div style="margin: 25px;">
                <div style="width: 350px; height: 300px; display: inline-block; background: rgba(27, 40, 56, 0.94); border-radius: 2px; float: right;">
                    <div style="margin: 20px;">
                        <h5 style="font-weight: bold; line-height: 150%;">{{$app->name}}</h5>
                        <div style="line-height: 195%; font-size: 11pt; color: #96B0C5;">{!!str_limit($app->description, 270)!!}</div> <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="position: absolute; bottom: 45px; right: 50px; font-size: 11pt;">Store page</a>
                    </div>
                </div>
                <div style="display: inline-block; float: left; width: 350px;">
                    <img style="border-radius: 2px; width: 350px; margin-bottom: 15px;" src="https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg">
                    <p style="font-style: italic; font-weight: bold; display: block; margin-bottom: 8px; font-size: 11pt;" href="https://store.steampowered.com/app/{{$app->path_int}}">Release date: {{$app->release_date}}</p>
                    <p style="font-style: italic; font-weight: bold; font-size: 11pt;" href="https://store.steampowered.com/app/{{$app->path_int}}">Updated {{$app->updated_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>

    <div style="margin: 25px;">
        {{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
        <div class="ui-widget" style="margin-bottom: 12px;">
        <div style="width: 100%; margin-bottom: 15px;">
            {{ html()->label("Distro:&nbsp;") }}

            {{ html()->select('distro')
                ->class('js__apply_now')
                ->placeholder("Select one")
                ->style('border-radius: 1px; border: none; outline:none; background: #2A475E; padding: 5px 12px;')
                ->attribute('maxlength', 1921)
                ->required()}}

            {{ html()->label("&nbsp;Version:&nbsp;") }}

            {{ html()->select('version')
                ->class('js__apply_now')
                ->placeholder("Select one")
                ->style('border-radius: 1px; border: none; outline:none; background: #2A475E; padding: 5px 12px;')
                ->attribute('maxlength', 191)
                ->required()}}

            {{ html()->label("&nbsp;Driver:&nbsp;") }}

            {{ html()->select('driver')
                ->class('js__apply_now')
                ->placeholder("Select one")
                ->style('border-radius: 1px; border: none; outline:none; background: #2A475E; padding: 5px 12px;')
                ->attribute('maxlength', 191)
                ->required()}}
        </div>
            {{ html()->label("CPU:&nbsp;") }}

            {{ html()->select('cpu')
                ->class('js__apply_now')
                ->placeholder("Select one")
                ->style('border-radius: 1px; border: none; outline:none; background: #2A475E; padding: 5px 12px;')
                ->attribute('maxlength', 191)
                ->required()}}

            {{ html()->label("&nbsp;GPU:&nbsp;") }}

            {{ html()->select('gpu')
                ->class('js__apply_now')
                ->placeholder("Select one")
                ->style('border-radius: 1px; border: none; outline:none; background: #2A475E; padding: 5px 12px;')
                ->attribute('maxlength', 191)
                ->required()}}
            
            {{ html()->label("&nbsp;Compatibility level:&nbsp;") }}

            {{ html()->select('compatibility_level')
                ->class('js__apply_now')
                ->placeholder("Select one")
                ->style('border-radius: 1px; border: none; outline:none; background: #2A475E; padding: 5px 12px;')
                ->attribute('maxlength', 191)
                ->required()}}
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ html()->label("What works") }}

                    {{ html()->textarea('works')
                        ->class('form-control')
                        ->style('height: 125px; background: #223247; border-radius: 1px; border: 1pt solid #2a475e;')
                        ->placeholder("Follow formatting guide")
                        ->attribute('maxlength', 191)
                        ->required()
                        ->autofocus() }}
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->

        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ html()->label("What's broken") }}

                    {{ html()->textarea('works')
                        ->class('form-control')
                        ->style('height: 125px; background: #223247; border-radius: 1px; border: 1pt solid #2a475e;')
                        ->placeholder("Follow formatting guide")
                        ->attribute('maxlength', 191)
                        ->required()
                        ->autofocus() }}
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col">
                <div class="form-group mb-0 clearfix">
                    {{ form_submit("Submit")
                        ->style('background: #2a475e; height: 42px; width: 100px; margin-top: 12px; font-size: 11pt; color: #96B0C5; border-radius: 1px; border: 1pt solid #2a475e;')
                    }}
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
        {{ html()->closeModelForm() }}
    </div>
</div>
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
$( function() {
		$.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = $( "<span>" )
					.addClass( "custom-combobox" )
					.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},

			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
					value = selected.val() ? selected.text() : "";

				this.input = $( "<input>" )
					.appendTo( this.wrapper )
					.val( value )
					.attr( "title", "" )
         .attr( "placeholder", "test" )
					.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: $.proxy( this, "_source" )
					})
					.tooltip({
						classes: {
							"ui-tooltip": "ui-state-highlight"
						}
					});

				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},

					autocompletechange: "_removeIfInvalid"
				});
			},

			_createShowAllButton: function() {
				var input = this.input,
					wasOpen = false;

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.tooltip()
					.appendTo( this.wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "custom-combobox-toggle ui-corner-right" )
					.on( "mousedown", function() {
						wasOpen = input.autocomplete( "widget" ).is( ":visible" );
					})
					.on( "click", function() {
						input.trigger( "focus" );

						// Close if already visible
						if ( wasOpen ) {
							return;
						}

						// Pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
					});
			},

			_source: function( request, response ) {
				var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = $( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
						return {
							label: text,
							value: text,
							option: this
						};
				}) );
			},

			_removeIfInvalid: function( event, ui ) {

				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}

				// Search for a match (case-insensitive)
				var value = this.input.val(),
					valueLowerCase = value.toLowerCase(),
					valid = false;
				this.element.children( "option" ).each(function() {
					if ( $( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});

				// Found a match, nothing to do
				if ( valid ) {
					return;
				}

				// Remove invalid value
				this.input
					.val( "" )
					.attr( "title", value + " didn't match any item" )
					.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
					this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},

			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});

		$( "#js__apply_now" ).combobox();
		
	} );
</script>
@endsection
