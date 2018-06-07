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
            </div>
            <div class="col-md-8 col-md-pull-4" style="border:0px solid gray">
                <h3>{{product.name}}</h3>
                <h5 style="color:#337ab7">vendido por <a href="#">Samsung</a> · <small style="color:#337ab7">(5054 ventas)</small></h5>

                <h6 class="title-price"><small>Price</small></h6>
                <h3 style="margin-top:0px;">{{product.price}}</h3>

                <h6 class="title-price"><small>Stock</small></h6>
                <h3 style="margin-top:0px;">{{product.stock}}</h3>

            </div>

            <div class="col-md-9 well">
                <div style="width:100%;border-top:1px solid silver">
                    <p style="padding:15px;">
                        <small>
                            {{product.details}}
                        </small>
                    </p>
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
                product:''
            }
        },
        methods:{
            getProduct(){
                let id=  this.$route.params.id;
                let url = backendUrl+'/api/products/'+id;
                console.log(url);
                axios.get(url)
                    .then(response =>{
                         console.log(response.data.data);
                        this.product = response.data.data
                    })
            }
        },
        mounted(){
            this.getProduct();
        }
    }
</script>