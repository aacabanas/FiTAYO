import { each } from 'jquery';
import './bootstrap';
import Utility from './utils/utility';

/* disables all console. methods and alert */
//each(window,(k,v)=>{if(v == "_load_users" || v== "_load_non_mem" || v== "utils")return;v = ()=>{}})
window.utils = new Utility(Utility.CTX_admin    )