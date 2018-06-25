<template>
    <div>
        <router-link to="/products">
            <button class="btn btn-primary">
                Products
            </button>
        </router-link>

        <div class="row">
            <div class="col-md-4 col-md-push-8 item-photo">
                <img style="max-width:100%;" src="https://as.ftcdn.net/r/v1/pics/ea2e0032c156b2d3b52fa9a05fe30dedcb0c47e3/landing/images_photos.jpg" alt="Card image cap"/>
                <br/>
                <div class="rating">
                    <h2 class="text-bold">Ratings :</h2>
                    <star-rating
                            :rating="product.reviewsRating"
                            :round-start-rating="false"
                            read-only
                    ></star-rating>
                </div>
            </div>
            <div class="col-md-8 col-md-pull-4" style="border:0px solid gray">
                <h3>{{product.name}}</h3>

                <h6 class="title-price"><small>Price</small></h6>
                <h3 style="margin-top:0px;">{{product.price}}</h3>

                <h6 class="title-price"><small>Stock</small></h6>
                <h3 style="margin-top:0px;">{{product.stock}}</h3>

                <div style="width:100%;border-top:1px solid silver">
                    <p style="padding:15px;">
                        <small>
                            {{product.details}}
                        </small>
                    </p>
                </div>





                <div class="reviews">
                    <h2>Reviews :</h2>
                    <ul v-for="review in reviews" style="list-style: none">
                        <li>
                            <small>{{review.reviews}}</small> <br/>
                            <star-rating
                                    :rating="review.star"
                                    :round-start-rating="false"
                                    :star-size="15"
                                    read-only
                            ></star-rating>
                            <span class="pull-right">By- {{review.customer}}</span>
                            <hr/>

                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
    import {backendUrl} from '../../Includes/Constant'

    export default {
        data:function () {
            return{
                product:'',
                reviews:{},
            }
        },
        methods:{
            getProduct(){
                let id=  this.$route.params.id;
                let url = backendUrl+'/api/products/'+id;
                let self = this;
                axios.get(url)
                    .then(response =>{
                         console.log(response.data.data);
                        this.product = response.data.data;
                        let href = response.data.data.href.reviews;
                        self.getReviews(href);
                    })
            },
            getReviews(href){
              axios.get(href)
                  .then(response =>{
                      console.log('dsa',response.data.data);
                      this.reviews = response.data.data;
                  })
            }
        },
        mounted(){
            this.getProduct();
            this.reviews;
        }
    }
</script>