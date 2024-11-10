import { toast } from 'vue3-toastify'
import { incrementCartCount } from '@/stores/cartStore';

const incrementQty = (item) => {
    if (item.qty >= 1) {
        item.qty++;
    }
};

const decrementQty = (item) => {
    if (item.qty > 1) {
        item.qty--;
    }
};

export const updateProductQuantity = (form, item, operation) => {
    if(operation === 'add'){
        incrementQty(item)
    }
    else{
        decrementQty(item)
    }
    setTimeout(() => {
        form.post(route('cart.update', { rowId: item.rowId, quantity: item.qty }), {
            onSuccess: () => {
                toast.info(item.name + ' quantity updated successfully')
            }
        })
    },1000)

}

export const addProductToCart = (form, product, quantity = 1) => {
    form.post(route('cart.add', { product: product, qty: quantity }), {
        onSuccess: () => {
            toast.success(product.name + ' added to cart!');
            incrementCartCount();
        }
    });
};
