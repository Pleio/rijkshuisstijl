
////////
////////  P R O F I L E  P H O T O  U P L O A D
////////
////
//// 1. Create `ProfilePhoto` (initiates Dropzone )
//// - .updated (true or false)
//// - .image (base64 or false (removed))
//// - .initiateCropper() (initiates Cropper jQuery plugin after ‘drop’)
//// - .updateExamples()
//// - .remove()
//// - .save()
////
//// 2. Events
//// - .js-removeProfilePhoto
//// - .js-postProfilePhoto
////



(function () {
    'use strict';

    var config = {
        defaultSrc: '/asset/image/profile-picture--default.svg',
        image: {
            height: 400,
            width: 400
        },
        ids: {
            dropzone: '#rhs-profile__file-dropzone',
            cropper: '#rhs-profile__photo-cropper'
        }
    };

    var $body = $('body');
    var $profile__file_dropzone = $(config.ids.dropzone);



    if( $profile__file_dropzone.length && ! $body.hasClass('ie-lt10') ) {

        //
        // 0. Initiate
        //

        var ProfilePhoto = function(config, liveUpdateProfilePhotos, postCallback) {
            var self = this;

            this.updated = false;
            this.image = false;
            this.src = config.defaultSrc;
            this.updateExamples = function(){
                this.updated = true;
                this.src = this.image ? this.image : config.defaultSrc;
                $('.js-updateProfilePhoto').attr('src', this.src);
            };
            this.remove = function(){
                if(this.image) {
                    this.updated = true;
                    $(config.ids.cropper).removeClass('rhs-profile__photo-cropper--active');
                    $('.js-removeProfilePhoto').addClass('rhs-button--disabled');
                    this.image = false;
                }
            };
            this.post = function(){
                $(config.ids.cropper).removeClass('rhs-profile__photo-cropper--active');
                if ( this.updated ) {
                    if ( postCallback !== undefined ) {
                        postCallback(this.image);
                        liveUpdateProfilePhotos(this.src);
                    } else {
                        throw new ReferenceError('The `postCallback` argument is missing!');
                    }
                }
            };

            // Initiate dropzone

            var dropzone = new Dropzone( config.ids.dropzone, {
                url: "/file/post", // not being used
                maxFilesize: 1,
                maxFiles: 1,
                acceptedFiles: 'image/*',
                parallelUploads: false,
                uploadMultiple: false,
                thumbnailWidth: null,
                thumbnailHeight: null
            });

            if (typeof dropzone.on == 'function') {
                dropzone.on("addedfile", function(file) {
                    setTimeout( function() {
                        self.image = $(config.ids.dropzone+' .dz-preview .dz-image img').attr('src');
                        self.initiateCropper();

                        setTimeout( function() {
                            dropzone.removeFile(file);
                        },250);

                        $('.js-removeProfilePhoto').removeClass('rhs-button--disabled');
                    }, 400);
                });
            }
        };

        ProfilePhoto.prototype.initiateCropper = function(){
            if( this.image ) {
                var self = this;

                $(config.ids.cropper).addClass('rhs-profile__photo-cropper--active');
                $(config.ids.cropper).html('<img id="js-cropImage" src="'+this.image+'" />')

                setTimeout( function(){
                    $('#js-cropImage').cropper({
                        aspectRatio: 1,
                        viewMode: 0,
                        autoCropArea: 0.84,
                        minCanvasWidth: 100,
                        minCanvasHeight: 100,
                        minCropBoxWidth: 40,
                        minCropBoxHeight: 40
                    });

                    $('#js-cropImage').on('cropend.cropper', function (e) {
                        self.image = $('#js-cropImage').cropper("getCroppedCanvas", { width: config.image.width, height: config.image.height }).toDataURL();
                        self.updateExamples();
                    });

                    setTimeout( function(){
                        self.image = $('#js-cropImage').cropper("getCroppedCanvas", { width: config.image.width, height: config.image.height }).toDataURL();
                        self.updateExamples();
                    }, 200);
                }, 40);
            }
        };

        //
        // 2. Events
        //

        var liveUpdateProfilePhotos = function(src){
            $('.profile-image__img, .top-navigation__link img, .mobile-navigation__profile img').attr('src', src);
        }

        var profilePhoto = new ProfilePhoto(config, liveUpdateProfilePhotos, function(){ console.log('postCallBack of ProfilePhoto'); }/*, postCallBack()*/);

        $body.on('click', '.js-removeProfilePhoto', function(){
            profilePhoto.remove();
            profilePhoto.updateExamples();
        });

        $body.on('click', '.js-postProfilePhoto', function(){
            profilePhoto.post();
        });
    }

})();
