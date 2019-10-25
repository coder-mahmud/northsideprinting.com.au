import $ from 'jquery';

class Search {
    // 1. describe and create/initiate our object
    constructor() {

        this.search_opener = $('.search_holder');
        this.search_closer = $('.closer_button');
        this.search_overlay = $('#search_overlay');
        this.searchInput = $('.search_input');
        this.search_result = $('#search_result');
        this.loader = $('.loader');
        this.isLoaderShowing = false;
        this.typingTimer;

        this.events();
    }

    // 2. events
    events() {
        this.search_opener.on('click',this.openOverlay.bind(this));
        this.search_closer.on('click',this.closeOverlay.bind(this));
        this.searchInput.on('keyup', this.typingLogic.bind(this));

    
        


    }

    // 3. methods (function, action...)

        openOverlay(){
            this.search_overlay.addClass('visible');
            
            setTimeout(() => this.searchInput.focus(),300);
            this.searchInput.val('');
        }

        closeOverlay(){
            this.search_overlay.removeClass('visible');
        }

        typingLogic(){
            clearTimeout(this.typingTimer);
            if(this.searchInput.val().length > 2){
                
                this.typingTimer = setTimeout(this.getResult.bind(this), 1000);
            }
            

        }

        getResult(){

            if(!this.isLoaderShowing){
                this.isLoaderShowing = true;
                this.loader.addClass('visible');
            }

            var data = {
                action: 'product_search',
                term: $('.search_input').val(),
            }

            $.ajax({
                url: ajax_url,
                data: data,
                success: (res) => {
                    $('#search_result').find('ul').empty();
                    res = JSON.parse(res);
                    // console.log(res);
                    if(res.length == 0){
                        console.log('No result found for '+ data.term );
                        var notice = '<li>No result found for<b> "'+ data.term + '"</br></li>';
                        $('#search_result').find("ul").append(notice);

                    }

                    for(var i=0; i < res.length; i++){
                       var html= `
                            <li> <a href="${res[i].permalink}"> ${res[i].title} </a></li>
                        `;
                        $('#search_result').find("ul").append(html);
                       
                       // console.log(res[i].id +'title - '+res[i].title);
                    }

                    this.isLoaderShowing = false;
                    this.loader.removeClass('visible');
                    
                    // console.log(res[responseText]);

                    // console.log(JSON.parse(res));

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //do something else
                    // console.log(errormessage);
                    // console.log('error happened');
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });



        }


}

export default Search;