import { SwalOptions } from "sweetalert/typings/modules/options";
import { useSweetAlert } from "@timedoor/baskito-ui";

interface CustomSwalOptions extends SwalOptions {
  icon: "success" | "error" | "warning" | "info";
}

const { warningAlert } = useSweetAlert();

export function useConfiguredSwal() {
  const confirmationAlert = (params: Partial<CustomSwalOptions>) =>
    warningAlert({
      title: "Are you sure?",
      text: "You will not be able to recover the action!",
      buttons: true,
      ...params,
    });
  return { confirmationAlert };
}
