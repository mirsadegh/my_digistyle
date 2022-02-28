<template>
    <div>
        <div class="form-group required">
            <label for="input-country" class="col-sm-2 control-label">استان</label>
            <div class="col-sm-10">
                <select class="form-control"  id="input-country" name="province_id" v-model="province" @change="getAllCities()"> 
                         
                    <option v-for="province in provinces" :value="province.id" :key="province.id">{{ province.name }}</option>        
                </select>
            </div>
            
        </div>
        <div class="form-group required">
           g <label for="input-zone" class="col-sm-2 control-label">شهر</label>
            <div class="col-sm-10">
                <select class="form-control" id="input-zone" name="city_id">
                    <option v-for="city in cities"  :value="city.id" :key="city.id">{{ city.name }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
     props: ['provinces','login'],
    data(){
        return {
            'province' : 'استان را انتخاب کنید.',
            'cities' : [],    
              
        }
    },
    methods:{
       
        getAllCities(){
            if(this.login == 0){
             axios.get('/api/cities/' + this.province).then(res=>{   
                  this.cities = res.data.cities
            }).catch(err=>{
                console.log(err)
            })  
            }else if(this.login == 1){

        axios.get('/profile/cities/' +this.province).then(res=>{    
                this.cities = res.data.cities;
            }).catch(err=>{
                console.log(err)
            })
            }
            
        }
    },

 
}
</script>
