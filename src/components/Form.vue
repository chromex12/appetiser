<template>
    <div id="form-template">
        <i-form>
            <form-item id='item-name' label='Name'>
                <i-input id="input-name" placeholder="Please enter your name" clearable v-model="username"/>        
            </form-item>
            <form-item id='item-password' label='Password'>
                <i-input id="input-password" type="password" placeholder="Please enter your password here"  clearable v-model="password"/>        
            </form-item>
            <form-item id='item-email' label='Email'>
                <i-input id="input-email" type="email" placeholder="email@example.com" clearable v-model="email"/>        
            </form-item>
            <i-button id='btn-register' @click="register()">register</i-button>
        </i-form>
    </div>
</template>

<script>
export default {
  name: "Form",
  methods: {
      register() {
          this.$store.dispatch('onSubmit');
      }
  },
  computed: {
    username: {
      get() {
        return this.$store.state.regsitrationData.name;
      },
      set(v) {
        this.$store.commit("setName", v);
      }
    },
    password: {
        get() {
            return this.$store.state.regsitrationData.password;
        },
        set(v) {
            this.$store.commit('setPassword', v);
        }
    },
    email: {
        get() {
            return this.$store.state.regsitrationData.email;
        },
        set(v) {
            this.$store.commit('setEmail', v);
        }
    }
  }
};
</script>
<style scoped>
    #form-template {
        position: absolute;
        bottom: 0;
        right: 0;
        left: 0;
        top: 0;
        z-index: 2;
    }
    #item-name {
        height: 30px;
        margin-top: 24px;
        margin-left: 16px;
    }
    #input-name {
        margin-left: 22px; 
        width: 250px;
        height: 114px;
        color: white;
        font-size: 14px;
    }
    #item-email {
        height: 30px;
        margin-top: 8px;
        margin-left: 16px;
    }
    #input-email {
        margin-left: 23px; 
        width: 250px;
        height: 30px;
        color: white;
        font-size: 14px;
    }
    #item-password {
        height: 30px;
        margin-top: 8px;
        margin-left: 16px;
    }
    #input-password {
        margin-left: 0px; 
        width: 250px;
        height: 114px;
        color: white;
        font-size: 14px;
    }
    #btn-register {
        margin-bottom: 8px;
        margin-left: 150px;
    }
</style>
