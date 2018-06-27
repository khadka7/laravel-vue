<template>
    <div>
        <router-link to="/products">
            <button class="btn btn-primary">
                Products
            </button>
        </router-link>

        <div class="row">
            <div class="col-md-5">
                <img style="max-width:100%;" :src="imageLink" :alt="product.image"/>
                <br/>
                <div class="rating" v-if="product.reviewsRating !== null">
                    <h2 class="text-bold">Ratings :</h2>
                    <star-rating ref="widget"
                            :rating="product.reviewsRating"
                            :round-start-rating="false"
                            :show-rating="false"
                            read-only
                    ></star-rating>

                </div>

                <div class="reviews" v-if="reviews !== undefined"
                     style="overflow-y:scroll; overflow-x:hidden; height:400px;">
                    <h2>Reviews :</h2>
                    <ul v-for="review in reviews" style="list-style: none">
                        <li>
                            <span style="width: 100%">{{review.reviews}}</span> <br/>
                            <small>
                                <div class="row">
                                    <div class=" col-md-8">
                                        <star-rating ref="widget"
                                                :rating="review.star"
                                                :round-start-rating="false"
                                                :star-size="8"
                                                :show-rating="false"
                                                read-only
                                        ></star-rating>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="pull-right">By- {{review.customer}}</span>
                                    </div>
                                </div>
                            </small>
                            <hr/>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-7" style="border:0px solid gray">

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

                <div class="review">
                    <h1>How Do You Rate this product ?</h1>
                    <form action="" method="post" v-on:submit.prevent="createReview">
                        <input type="text" v-model="reviewItem.customer" placeholder="Your name" required>
                        <p v-if="customerError" style="color: red">{{customerError}}</p>

                        <star-rating
                                v-model="reviewItem.star"
                                :star-size="20"
                                :show-rating="false"
                        ></star-rating>
                        <p v-if="starError" style="color: red">{{starError}}</p>

                        <textarea v-model="reviewItem.review" id="" cols="30" rows="10" class="form-control" required></textarea>
                        <p v-if="reviewError" style="color: red">{{reviewError}}</p>


                        <input type="submit" value="save">
                    </form>
                </div>


            </div>
        </div>
        <hr/>


    </div>


</template>

<script>
    import {backendUrl} from '../../Includes/Constant'
    export default {
        data:function () {
            return{
                product:'',
                imageLink:'',
                starError:'',
                customerError:'',
                reviewError:'',
                reviews:{},
                reviewItem:{}
            }
        },
        methods:{
            getProduct(){
                let id=  this.$route.params.id;
                let url = backendUrl+'/api/products/'+id;
                let self = this;
                axios.get(url)
                    .then(response =>{
                         // console.log(response.data.data);
                        this.product = response.data.data;
                        this.imageLink = backendUrl+'/storage/'+response.data.data.image_path;
                        console.log(response.data.data.reviewsRating);
                        let href = response.data.data.href.reviews;
                        self.getReviews(href);
                    })
            },
            getReviews(href){
              axios.get(href)
                  .then(response =>{
                      this.reviews = response.data.data;
                  })
            },
            createReview(event){
                let productId=  this.$route.params.id;
                let reviewUrl = backendUrl+'/api/products/'+productId+'/reviews';
                let reviewItem = this.reviewItem;

                this.starError = "";
                this.customerError = "";
                this.reviewError= "";

                if(reviewItem.star && reviewItem.customer && reviewItem.review && reviewItem.customer.length <= 20){
                    axios.post(reviewUrl,this.reviewItem)
                        .then((response) => {
                            console.log('axios log: ', response);
                            location.reload();
                            // event.target.reset();
                            // this.$router.push({name: 'product', params: { id:  productId }})
                        })
                        .catch(error => Promise.reject(error))
                }else{
                    if(reviewItem.star === undefined){
                        this.starError = "Star Required";

                    }
                    if(reviewItem.customer === undefined){
                        this.customerError = "Name Required"

                    }
                    if(reviewItem.customer.length > 20){
                            this.customerError = "Name must be less than 20 character"

                    }
                    if(reviewItem.review === undefined){
                        this.reviewError = "Review Required"
                    }
                }

            }
        },
        mounted(){
            this.getProduct();
            this.reviews;
        },
    }
</script>