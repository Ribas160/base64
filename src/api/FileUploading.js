import axios from "axios";

export default {
    encode(data) {
        return axios.post(process.env.VUE_APP_BACKEND_URL,
            data,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            });
    }
}