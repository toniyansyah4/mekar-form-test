<template>
    <div>
      <form @submit.prevent="submitForm">
        <div>
          <label for="name">Name:</label>
          <input id="name" v-model="form.name" type="text">
          <span v-if="errors.name" class="error">{{ errors.name }}</span>
        </div>
        <div>
          <label for="identityNumber">Identity Number:</label>
          <input id="identityNumber" v-model="form.identityNumber" type="text">
          <span v-if="errors.identityNumber" class="error">{{ errors.identityNumber }}</span>
        </div>
        <div>
          <label for="email">Email Address:</label>
          <input id="email" v-model="form.email" type="email">
          <span v-if="errors.email" class="error">{{ errors.email }}</span>
        </div>
        <div>
          <label for="dob">Date of Birth:</label>
          <input id="dob" v-model="form.dob" type="date">
          <span v-if="errors.dob" class="error">{{ errors.dob }}</span>
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Swal from 'sweetalert2';
  
  export default {
    data() {
      return {
        form: {
          name: '',
          identityNumber: '',
          email: '',
          dob: '',
        },
        errors: {
          name: '',
          identityNumber: '',
          email: '',
          dob: '',
        },
      };
    },
    methods: {
      async submitForm() {
        try {
          const response = await axios.post('/api/form-submissions', this.form);
          console.log(response.data);
          this.form = {
            name: '',
            identityNumber: '',
            email: '',
            dob: '',
          };
          this.errors = {
            name: '',
            identityNumber: '',
            email: '',
            dob: '',
          };
          Swal.fire('Success', 'Form submitted successfully!', 'success');
    
        } catch (error) {
          console.error(error.response.data.message);
          this.errors.name = error.response.data.errors.name ? error.response.data.errors.name[0] : '';
          this.errors.identityNumber = error.response.data.errors.identityNumber ? error.response.data.errors.identityNumber[0] : '';
          this.errors.email = error.response.data.errors.email ? error.response.data.errors.email[0] : '';
          this.errors.dob = error.response.data.errors.dob ? error.response.data.errors.dob[0] : '';
          Swal.fire('Error', error.response.data.message, 'error');
        }
      },
      // validateForm() {
      //   this.errors = {
      //     name: '',
      //     identityNumber: '',
      //     email: '',
      //     dob: '',
      //   };
      //   let isValid = true;
        
      //   // Validate name
      //   if (!this.form.name) {
      //     this.errors.name = 'Name is required';
      //     isValid = false;
      //   }
        
      //   // Validate identity number
      //   if (!this.form.identityNumber) {
      //     this.errors.identityNumber = 'Identity Number is required';
      //     isValid = false;
      //   }
        
      //   // Validate email
      //   if (!this.form.email) {
      //     this.errors.email = 'Email Address is required';
      //     isValid = false;
      //   }
        
      //   // Validate date of birth
      //   if (!this.form.dob) {
      //     this.errors.dob = 'Date of Birth is required';
      //     isValid = false;
      //   }
        
      //   return isValid;
      // },
    },
  };
  </script>

<style scoped>
form {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #f9f9f9;
}

div {
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="date"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

.error {
  color: red;
  font-size: 12px;
}
</style>